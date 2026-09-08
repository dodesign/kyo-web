# Auto-sync this repository to GitHub.
#
# NOTE: keep this file ASCII-only. Windows PowerShell 5.1 reads BOM-less files
#       as Shift-JIS on a Japanese system, which corrupts multi-byte comments.
#
# Runs from the scheduled task "GitAutoSync-kyo".
#   * skips entirely when nothing changed
#   * refuses to run twice at once (lock file)
#   * always pushes, so a commit made by hand still reaches GitHub

$ErrorActionPreference = 'SilentlyContinue'
$env:Path += ";$env:ProgramFiles\Git\cmd;$env:LOCALAPPDATA\Programs\Git\cmd"
$env:GIT_EDITOR = 'true'
$env:GIT_SEQUENCE_EDITOR = 'true'
Set-Location -LiteralPath $PSScriptRoot

$lock = Join-Path $PSScriptRoot '.git\auto-sync.lock'

# ---- stale lock (older than 30 min) is ignored -----------------------------
if (Test-Path $lock) {
    $age = (Get-Date) - (Get-Item $lock).LastWriteTime
    if ($age.TotalMinutes -lt 30) { exit }
    Remove-Item $lock -Force
}
New-Item -ItemType File -Path $lock -Force | Out-Null

try {
    # a leftover index.lock from a crashed run blocks everything
    $indexLock = Join-Path $PSScriptRoot '.git\index.lock'
    if (Test-Path $indexLock) {
        $age = (Get-Date) - (Get-Item $indexLock).LastWriteTime
        if ($age.TotalMinutes -gt 20) { Remove-Item $indexLock -Force }
    }

    git add -A
    if ($LASTEXITCODE -ne 0) { exit $LASTEXITCODE }

    git diff --cached --quiet
    $hasChanges = ($LASTEXITCODE -eq 1)
    if ($LASTEXITCODE -gt 1) { exit $LASTEXITCODE }
    if ($hasChanges) {
        git commit -m ("auto-sync " + (Get-Date -Format "yyyy-MM-dd HH:mm"))
        if ($LASTEXITCODE -ne 0) { exit $LASTEXITCODE }
    }

    git fetch origin master
    if ($LASTEXITCODE -ne 0) { exit $LASTEXITCODE }
    git rebase origin/master
    if ($LASTEXITCODE -ne 0) {
        git rebase --abort
        exit $LASTEXITCODE
    }
    git push origin master
}
finally {
    Remove-Item $lock -Force -ErrorAction SilentlyContinue
}

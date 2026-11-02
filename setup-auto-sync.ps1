# Register the scheduled task that keeps this repository in sync with GitHub.
#
# NOTE: keep this file ASCII-only (Windows PowerShell 5.1 / Shift-JIS issue).
#
# Interval: every 10 minutes, hidden window, runs as the current user.

$IntervalMinutes = 10

$repo   = $PSScriptRoot
$runner = Join-Path $repo "auto-sync.ps1"

$action = New-ScheduledTaskAction -Execute "powershell.exe" `
  -Argument ("-WindowStyle Hidden -NonInteractive -ExecutionPolicy Bypass -File `"$runner`"")

# NOTE (2026-11-02): without -RepetitionDuration the repetition stopped after 1 day
#   (the task last ran on 2026-10-14). Repeat for 10 years, and also start at logon.
$trigger = New-ScheduledTaskTrigger -Once -At (Get-Date).AddMinutes(1) `
  -RepetitionInterval (New-TimeSpan -Minutes $IntervalMinutes) `
  -RepetitionDuration (New-TimeSpan -Days 3650)
$logon = New-ScheduledTaskTrigger -AtLogOn
$logon.Repetition = $trigger.Repetition

$settings = New-ScheduledTaskSettingsSet -StartWhenAvailable `
  -AllowStartIfOnBatteries -DontStopIfGoingOnBatteries `
  -MultipleInstances IgnoreNew `
  -ExecutionTimeLimit (New-TimeSpan -Minutes 30)

try {
  Register-ScheduledTask -TaskName "GitAutoSync-kyo" -Action $action -Trigger @($trigger, $logon) `
  -Settings $settings -Force `
  -Description "Auto sync kyo (Lolipop) web folder to GitHub" -ErrorAction Stop | Out-Null
} catch {
  Write-Host ""
  Write-Host "FAILED: could not register the task." -ForegroundColor Red
  Write-Host $_.Exception.Message
  Write-Host "Right-click this bat and choose 'Run as administrator', then try again." -ForegroundColor Yellow
  exit 1
}

Write-Host ""
Write-Host ("OK: 'GitAutoSync-kyo' now runs every {0} minutes (hidden)." -f $IntervalMinutes) -ForegroundColor Green
Write-Host "You no longer need to run the manual sync bat."

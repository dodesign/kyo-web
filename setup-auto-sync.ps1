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

$trigger = New-ScheduledTaskTrigger -Once -At (Get-Date).AddMinutes(1) `
  -RepetitionInterval (New-TimeSpan -Minutes $IntervalMinutes)

$settings = New-ScheduledTaskSettingsSet -StartWhenAvailable `
  -AllowStartIfOnBatteries -DontStopIfGoingOnBatteries `
  -MultipleInstances IgnoreNew `
  -ExecutionTimeLimit (New-TimeSpan -Minutes 30)

Register-ScheduledTask -TaskName "GitAutoSync-kyo" -Action $action -Trigger $trigger `
  -Settings $settings -Force `
  -Description "Auto sync kyo (Lolipop) web folder to GitHub" | Out-Null

Write-Host ""
Write-Host ("OK: 'GitAutoSync-kyo' now runs every {0} minutes (hidden)." -f $IntervalMinutes) -ForegroundColor Green
Write-Host "You no longer need to run the manual sync bat."

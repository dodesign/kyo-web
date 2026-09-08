@echo off
chcp 65001 > nul
cd /d "%~dp0"
echo ==========================================
echo   Set up GitAutoSync-kyo (every 10 min)
echo ==========================================
echo.
powershell -NoProfile -ExecutionPolicy Bypass -File "%~dp0setup-auto-sync.ps1"
echo.
pause

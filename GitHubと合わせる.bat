@echo off
chcp 65001 >nul
cd /d "%~dp0"
where git >nul 2>&1 || set "PATH=%PATH%;%ProgramFiles%\Git\cmd;%LOCALAPPDATA%\Programs\Git\cmd"

echo ==========================================
echo   Pull GitHub changes into this folder
echo ==========================================
echo.
echo Run this after editing a file directly on the GitHub website.
echo Without it, push stops working (silently) for this folder.
echo.

echo [1/4] Staging local changes...
git add -A

echo [2/4] Committing...
git commit -m "sync before pull"

echo [3/4] Pulling from GitHub (rebase)...
git pull --rebase
if errorlevel 1 goto failed

echo [4/4] Pushing to GitHub...
git push
if errorlevel 1 goto failed

echo.
echo ==========================================
echo   Finished OK. You can close this window.
echo ==========================================
pause
exit /b 0

:failed
echo.
echo ******************************************
echo   FAILED. Copy the messages above and ask.
echo   To undo a half-done rebase:  git rebase --abort
echo ******************************************
pause
exit /b 1

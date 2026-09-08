@echo off
chcp 65001 >nul
cd /d "%~dp0"
where git >nul 2>&1 || set "PATH=%PATH%;%ProgramFiles%\Git\cmd;%LOCALAPPDATA%\Programs\Git\cmd"

echo ==========================================
echo   Sync this folder to GitHub
echo ==========================================
echo.

rem A crashed git run can leave index.lock behind and block everything.
if exist ".git\index.lock" (
  echo Removing a leftover .git\index.lock ...
  del /q ".git\index.lock"
)

echo [1/3] Staging changes...
git add -A

echo [2/3] Committing...
git commit -m "sync"

echo.
echo [3/3] Pushing to GitHub...
rem -u so the very first push also sets the upstream branch.
git push -u origin master

echo.
echo ==========================================
echo   Finished. You can close this window.
echo ==========================================
pause

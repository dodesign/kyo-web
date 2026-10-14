@echo off
chcp 65001 >nul
cd /d "%~dp0"
where git >nul 2>&1 || set "PATH=%PATH%;%ProgramFiles%\Git\cmd;%LOCALAPPDATA%\Programs\Git\cmd"

echo ==========================================
echo   Sync this folder to GitHub
echo ==========================================
echo.

rem This folder lives on a cloud-synced drive, so its owner SID can differ from
rem the current Windows user. Git then refuses everything with
rem "detected dubious ownership". Registering it as a safe directory fixes it.
rem Harmless to repeat: --add would duplicate the entry, so remove it first.
for /f "delims=" %%P in ('cd') do set "REPO=%%P"
git config --global --unset-all safe.directory "%REPO:\=/%" >nul 2>&1
git config --global --add safe.directory "%REPO:\=/%" >nul 2>&1

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

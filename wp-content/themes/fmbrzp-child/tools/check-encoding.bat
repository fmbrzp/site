@echo off
setlocal

php "%~dp0check-encoding.php"

if %errorlevel% neq 0 (
  echo.
  echo Foram encontrados possiveis problemas de encoding.
  exit /b 1
)

echo.
echo OK: nenhum problema de encoding encontrado.
exit /b 0
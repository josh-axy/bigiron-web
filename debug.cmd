@echo off

rem color f3

echo.
echo ------------------------
echo --  Django服务器调试  --
echo ------------------------

echo.
echo 1. 本机    127.0.0.1:8000
echo.
echo 2. 局域网  10.170.155.84:8000
echo.
echo 3. 手动输入
echo.

:cho
set /p place=        请选择服务器位置：

if "%place%"=="1" goto c1
if "%place%"=="2" goto c2
if "%place%"=="3" goto c3

echo 无效命令
echo.
goto cho

:c1
cls
title 本地服务器 -- Django
python manage.py runserver 127.0.0.1:8000
pause

:c2
cls
title 局域网服务器 -- Django
python manage.py runserver 10.170.155.84:8000
pause

:c3
cls
set /p var=         请输入服务器ip（端口固定8000）：
title 服务器ip：%var% -- Django
python manage.py runserver %var%:8000
pause

:BEGIN
@echo off
for /F %%i in ('dir "D:\capture\*.jpg" /b /s /a /o:d /t:c') do (
@echo open 103.20.148.22>ftp.txt
@echo test>>ftp.txt
@echo nkvvgxELpf>>ftp.txt
@echo prompt y>>ftp.txt
@echo type binary>>ftp.txt
@echo lcd D:\capture>>ftp.txt
@echo cd upload/Images/photo>>ftp.txt
@echo put %%i>>ftp.txt
@echo !del /f/s/q %%i>>ftp.txt
@echo close>>ftp.txt
@echo bye>>ftp.txt
ftp -s:ftp.txt
del ftp.txt
cls
)
cls
rem timeout /t 10
goto :BEGIN
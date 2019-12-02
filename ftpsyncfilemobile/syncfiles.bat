:BEGIN
@echo off
@echo open 192.168.1.46 2121>ftp.txt
@echo admin>>ftp.txt
@echo admin>>ftp.txt
@echo prompt y>>ftp.txt
@echo type binary>>ftp.txt
@echo lcd D:\capture>>ftp.txt
@echo cd sdcard/DCIM/Camera>>ftp.txt
@echo mget *.jpg>>ftp.txt
@echo close>>ftp.txt
@echo bye>>ftp.txt
ftp -s:ftp.txt
del ftp.txt
cls
for /F %%i in ('dir "D:\capture\*.jpg" /b /a /o:d /t:c') do (
@echo open 192.168.1.46 2121>ftp.txt
@echo admin>>ftp.txt
@echo admin>>ftp.txt
@echo prompt y>>ftp.txt
@echo cd sdcard/DCIM/Camera>>ftp.txt
@echo delete %%i>>ftp.txt
@echo close>>ftp.txt
@echo bye>>ftp.txt
ftp -s:ftp.txt
del ftp.txt
cls
)
cls
rem timeout /t 10
goto :BEGIN
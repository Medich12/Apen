net stop Apache2.4
cd c:\Apen\Apache24\bin
httpd.exe -k uninstall
httpd.exe -k install
httpd.exe -k start
pause
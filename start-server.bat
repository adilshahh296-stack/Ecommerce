@echo off
cd C:\ecommerce
set Path=C:\Users\HP\.config\herd\bin;C:\Users\HP\.config\herd\bin\php84;%Path%

echo Starting Laravel development server...
echo.
echo Frontend: http://localhost:8000
echo Admin Panel: http://localhost:8000/admin
echo Admin Login: kakaqasim10@gmail.com
echo.
echo To stop the server, press Ctrl+C
echo.

php artisan serve

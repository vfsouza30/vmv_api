@echo off
cd C:\vmv_api\api
php artisan queue:work --max-jobs=15 --stop-when-empty
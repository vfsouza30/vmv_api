@echo off
cd C:\Users\Victor\OneDrive\Documentos\vmv\vmv_api\api
php artisan queue:work --max-jobs=10 --stop-when-empty
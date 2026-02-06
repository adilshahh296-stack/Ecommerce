release: composer install --no-interaction --ignore-platform-req=ext-intl --ignore-platform-req=ext-zip && php artisan migrate --force
web: vendor/bin/heroku-php-nginx -C ./nginx.conf public/

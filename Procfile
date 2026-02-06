release: install-php-extensions intl zip && composer install --optimize-autoloader --no-scripts && php artisan migrate --force
web: vendor/bin/heroku-php-nginx -C ./nginx.conf public/

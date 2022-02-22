sail up

php artisan breeze:install

npm install

npm run dev

php artisan migrate

php artisan ide-helper:models -M

Clone Setup:

```
docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/var/www/html \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
```
```
mkdir -p storage/framework/{sessions,views,cache}
```

Laravel template includes:


```
Auth Scaffolding via Laravel Breeze
AlphineJS
Tailwind css
```

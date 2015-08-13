# Larasites

> Showcasing the best websites built with Laravel & Lumen.

#### Installation

```sh
git clone git@github.com:we-are-next/www.larasites.com.git larasites
cd larasites
npm install
```

#### Running Tests

```sh
npm test
```

#### Deploy Script

```sh
git pull origin master
composer install --no-interaction --no-dev --prefer-dist
php artisan migrate --force
php artisan route:clear
php artisan route:cache
```

#### Queue Workers

```
Connection              : database
Queue                   : default
Maximum Seconds Per Job : 60
Rest Seconds When Empty : 10
Maximum Tries           : 3
Environment             : production
Daemon                  : yes
```

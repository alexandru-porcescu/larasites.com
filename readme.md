# Larasites

> Showcasing the best websites built with [Laravel](http://laravel.com/)
> & [Lumen](http://lumen.laravel.com/).

#### Installation

```sh
git clone git@github.com:we-are-next/www.larasites.com.git larasites
cd larasites
composer install
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
php artisan route:cache
```

#### Queue Worker(s)

A queue worker needs to be running in order to run background jobs.

```
Connection              : database
Queue                   : default
Maximum Seconds Per Job : 60
Rest Seconds When Empty : 10
Maximum Tries           : 3
Environment             : production
Daemon                  : yes
```

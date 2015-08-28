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

#### Building Assets

Production assets are included in version control, to get them deployed you'll
need to build them and commit the changes.

```sh
gulp --production
git commit -a -m 'builds assets'
```

#### Deploy Script

```sh
git pull origin master
composer install --no-interaction --no-dev --prefer-dist
php artisan migrate --force
```

#### Queue Worker(s)

A queue worker needs to be running in order to process background jobs.

```
Connection              : database
Queue                   : default
Maximum Seconds Per Job : 60
Rest Seconds When Empty : 10
Maximum Tries           : 3
Environment             : production
Daemon                  : yes
```

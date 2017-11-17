🚨 **DEPRECATION NOTICE:** This project is no longer active. 🚨

---

# Larasites

> Showcasing the best websites built with [Laravel](http://laravel.com/)
> & [Lumen](http://lumen.laravel.com/).

[![Build Status](https://travis-ci.org/we-are-next/www.larasites.com.svg?branch=master)](https://travis-ci.org/we-are-next/www.larasites.com)
[![Code Climate](https://codeclimate.com/github/we-are-next/www.larasites.com/badges/gpa.svg)](https://codeclimate.com/github/we-are-next/www.larasites.com)
[![Test Coverage](https://codeclimate.com/github/we-are-next/www.larasites.com/badges/coverage.svg)](https://codeclimate.com/github/we-are-next/www.larasites.com/coverage)

#### Installation

```sh
git clone git@github.com:we-are-next/www.larasites.com.git larasites
cd larasites
composer install
npm install
cp .env.example .env
```

#### Running Tests

```sh
npm test
```

#### Working Locally

Check out the example `.env` file for what's needed to get up and running.

##### Twitter Application

You'll need to create a Twitter application to work locally.  Unfortunately
Twitter applications don't allow port numbers in their callback URL's... so
you'll have to run the development server on port 80.

If you use the [provided
credentials](https://github.com/we-are-next/www.larasites.com/blob/968e321208bd9e8c7ba1417030b2a0116021b3eb/.env.example#L20-L22),
then you'll need to run the development server as follows:

```sh
sudo php artisan serve --port 80 --host larasites.local
```

You can create your own test application
[here](https://apps.twitter.com/app/new).

#### Building Assets

Larasites uses [Laravel Elixir](http://laravel.com/docs/5.1/elixir) and
[Gulp](http://gulpjs.com/) to build assets.

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
php artisan route:cache
php artisan optimize
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

### License

MIT © [Wayne Ashley Berry](https://wayne.cloud)

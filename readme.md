# Larasites

### Deploy Script

```sh
git pull origin master
composer install --no-interaction --no-dev --prefer-dist
php artisan migrate --force
php artisan route:clear
php artisan route:cache
```

### Queue Workers

```
Connection              : database
Queue                   : default
Maximum Seconds Per Job : 60
Rest Seconds When Empty : 10
Maximum Tries           : 3
Environment             : production
Daemon                  : yes
```

## DiVin project
### Ecommerce site built with laravel
#### How to contribute

1. Install all Dependencies with composer, using this command:
```
    composer update
```

2. Create a Mysql database name `ecommerce`

3.  Rename file `.env.example` to `.env` and replace the content like this (Change the DB information with yours):
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:6Awu3Y4VXgLtgiwu1qrcNDTpDJzcel23+xUdWxyvuk0=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=5f6d40b92a8a0a
MAIL_PASSWORD=300f9a2d75400e
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=hello@devin.com
MAIL_FROM_NAME=DeVin

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=

```

4. Migrate the database:
```
php artisan migrate
```

5. Seed your database with user seeder and product seeder:
```
php artisan db:seed
```

6. See all route available with this command:
```
php artisan route:list
```

_User credential:_ 
email: `admin@admin.com`  
password: `password`  

Contact me for more information!

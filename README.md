## DiVin project
### Ecommerce site built with Laravel
#### Setup

1. Install all Dependencies with composer, using this command:
```
composer install
```

2. Create a Mysql database name `ecommerce`

3.  Rename file `.env.example` to `.env` and replace the content with this one (maybe change the DB informations to suit with your DB config):
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

MAILCHIMP_APIKEY=9a15d192e024b1f4d59b5a033d8e8a61-us17
MAILCHIMP_LIST_ID=2abd49d3c3

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=

```

4. Migrate the database:
```
php artisan migrate
```

5. Seed your database with user and setting seeder:
```
php artisan db:seed
```

6. See all route available with this command:
```
php artisan route:list
```

_User credentials:_  
email: `admin@admin.com`  
password: `password`

### How to contribute

1. Fork this project.
2. Clone the project you just forked.
3. Create a new branch.
4. Update something cool! -> commit && push.
5. Create pull request (PR).
6. Receive my many thanks.

_Please detail your changes in the PR (with picture is the best!)_

Contact me for more information!
My [Facebook](https://www.facebook.com/ledienphuc).:octocat:



# Caching Demo With Redis Memory Cache



In this app there is list of 10K Product. To effectively access product info here Redis cache is used for faster data retrieval.

## How to setup the project
##### 1. Clone the git hub repository
##### 2.  Make a .env file and copy the following file in it.
```  
APP_NAME=Laravel  
APP_ENV=local  
APP_KEY=base64:8G9mUbPxlDcR9w1nTyD8FwIQJLSwMbkptipLUZMmIyg=  
APP_DEBUG=true  
APP_URL=http://localhost  
  
APP_LOCALE=en  
APP_FALLBACK_LOCALE=en  
APP_FAKER_LOCALE=en_US  
  
APP_MAINTENANCE_DRIVER=file  
# APP_MAINTENANCE_STORE=database  
  
PHP_CLI_SERVER_WORKERS=4  
  
BCRYPT_ROUNDS=12  
  
LOG_CHANNEL=stack  
LOG_STACK=single  
LOG_DEPRECATIONS_CHANNEL=null  
LOG_LEVEL=debug  
  
DB_CONNECTION=sqlite  
# DB_HOST=127.0.0.1  
# DB_PORT=3306  
# DB_DATABASE=laravel  
# DB_USERNAME=root  
# DB_PASSWORD=  
  
SESSION_DRIVER=database  
SESSION_LIFETIME=120  
SESSION_ENCRYPT=false  
SESSION_PATH=/  
SESSION_DOMAIN=null  
  
BROADCAST_CONNECTION=log  
FILESYSTEM_DISK=local  
QUEUE_CONNECTION=database  
  
CACHE_STORE=redis  
CACHE_DRIVER=redis  
REDIS_PASSWORD=null  
REDIS_CLIENT=phpredis  
  
REDIS_CACHE_HOST=127.0.0.1  
REDIS_CACHE_PORT=6379  
REDIS_CACHE_DB=1  
REDIS_CACHE_CONNECTION=cache  
REDIS_CACHE_LOCK_CONNECTION=default  
  
  
MAIL_MAILER=log  
MAIL_SCHEME=null  
MAIL_HOST=127.0.0.1  
MAIL_PORT=2525  
MAIL_USERNAME=null  
MAIL_PASSWORD=null  
MAIL_FROM_ADDRESS="hello@example.com"  
MAIL_FROM_NAME="${APP_NAME}"  
  
AWS_ACCESS_KEY_ID=  
AWS_SECRET_ACCESS_KEY=  
AWS_DEFAULT_REGION=us-east-1  
AWS_BUCKET=  
AWS_USE_PATH_STYLE_ENDPOINT=false  
  
VITE_APP_NAME="${APP_NAME}"
```
##### 3. Run
```
composer update
```

##### 4. Create a file database.sqlite under in the database folder.
##### 5. Run following command
```
php artisan migrate 
php artisan db:seed
php artisan optimize:clear
```
This will create the database tables and fill the table with seeded data.
##### 6. Now to run Redis there is phpredis extension requirement.
```
composer require predis/predis:^2.0
```

##### 6. Now Redis Docker image is need. To pull docker image run the following command.
```
docker pull redis
# After pulling the image run 
docker run --name my-redis -p 6379:6379 -d redis
```
##### 7. After serving the application  the product will load. In each product card there is button to view product with cache and without cache with showing the retrieval time in seconds. But even for with cache button for the first click it will take time because the product was never cached before. From second click and onward it will load from the cache for with cache button.  By looking carefully on the retrieval time for both option it will be clear that cache is mach faster then database retrieval.

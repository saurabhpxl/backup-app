## Backup App

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


#### Installation

##### Clone the Repo: 
```sh
git clone https://github.com/saurabhpxl/backup-app.git
cd backup-ap
```


##### Install dependencies:

```sh
composer install
``` 


##### Configuration:

1. Generate a key and copy paste it in 
```sh
cp .env.example .env
php artisan key:generate
```

2. Create a database and add configuration details in `.env` file
```sh
mysql -u <user> -p
CREATE DATABASE backupapp0;
CREATE DATABASE backupapp1;
CREATE DATABASE backupapp2;
CREATE DATABASE backupapp3;
```

3. Run migrations
```sh
php artisan migrate
```

##### Run app :
```sh
php artisan serve
```
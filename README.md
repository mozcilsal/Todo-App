# todo


Todo build on Laravel Framework. <br />
Laravel version: 10.x <br />
Php version: 8.1.x <br />
MySQL version: 8.x <br />

## Installation

Use the git and composer to install

```bash
git clone https://github.com/mozcilsal/Todo-App
cd Todo-App/
cp .env.example .env
```

Edit .env file for your Todo App information then

Edit database/seeders/UserSeeder.php file for Todo App users credentials.

```bash
composer install
php artisan key:generate
php artisan config:cache
php artisan migrate:refresh --seed
php artisan serve
```


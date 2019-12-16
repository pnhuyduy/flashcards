<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Getting Started
## Installation
Clone the repository
```bash
git clone https://github.com/pnhuyduy/flashcards
```
Switch to the repo folder
```bash
cd flashcards
```
Install all the dependencies using composer
```bash
composer install
```
Copy the example env file and make the required configuration changes in the .env file
```bash
cp .env.example .env
```
Generate a new application key
```bash
php artisan key:generate
```
Run the database migrations **(Set the database connection in .env before migrating)**
```bash
php artisan migrate
```
Start the local development server
```bash
php artisan serve
```
You can now access the server at [http://localhost:8000](http://localhost:8000)
**TL;DR command list**
```bash
git clone git@github.com:pnhuyduy/flashcards.git
cd flashcards
composer install
cp .env.example .env
php artisan key:generate
```
## Database Seeding
```bash
php artisan db:seed
```
***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command
```bash
php artisan migrate:refresh
```
## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

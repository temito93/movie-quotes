# Movie Quotes

In Movie Quotes App you can see randomly generated quotes with movie name.

## Prerequisites
* PHP@8.0.2
* MYSQL@8
* npm@8
* composer@2.4.3

##

## Tech Stack
* [Laravel@9.x](https://laravel.com/docs/9.x/releases) - back-end framework
*  [Spatie Translatable](https://spatie.be/docs/laravel-translatable/v6/introduction) - package for translation
* [Tailwind Css@3.x](https://tailwindcss.com/docs/installation) - package for styling

##

## Getting Started
1. First of all you need to clone Movie Quotes repository from github:

```bash
 git clone https://github.com/RedberryInternship/temo-jincharadze-movie-quotes.git
```

2. Next step requires you to run composer install in order to install all the dependencies:

```bash
 composer install
```
3. After you have installed all the PHP dependencies, it's time to install all the JS dependencies:

```bash
 npm install
```
and also:

```bash 
npm run dev
```
4. Now you should provide .env file all the necessary environment variables:
```bash
DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=*****

DB_USERNAME=*****

DB_PASSWORD=*****
```
##

## Migration
if you've completed getting started section, then just execute:
```bash
php artisan migrate
```
##

## Development
You can run Laravel's built-in development server by executing:
```bash
php artisan serve
```
when working on JS you may run:

```bash
npm run dev 
```

## 
## Register Admin User
You can create admin user by executing command in terminal:
```bash
php artisan admins:create
```
##
## Reset User Password
You can reset password of user by executing command in terminal:
```bash
php artisan reset:password
```
##
## Login Url
```bash
    127.0.0.1:port/login
```

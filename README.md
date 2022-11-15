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

4. Now we need to set our env file. Go to the root of your project and execute this command.
```bash
cp .env.example .env
```

5. Now you should provide .env file all the necessary environment variables:
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

## Mysql Diagram
[View Diagram](https://drawsql.app/teams/redberry-33/diagrams/movies-quote)
![diagram](https://lh3.googleusercontent.com/a-Gv3RdC1s-N7E-NcyAbIdQQ7UwS3FBCEOTk5-W9KbgWJDCBMMjcX14Mjam57806vZAXtN3Goc1f9WqkIVf-TvXYhFwZOTNy6j7yKkOqr0lS9mbMtyVTiFE4YfpeM6aHt2VwAP5TVHIOrX42Rrc3vQJE_hkPvCuQJYCtsUaz1MeEPf4E-RkpkIBYkTNA728tyoBrXOgfhteTL7cZF1gGILTPctFY0kdRNFT7WbkR7xMJyvyAVzJDiQxaNIUbAjAGqNUCMSVU_aGMsxjrEthx50SSIc_whu3N7eq7PKFFk4VjkqJsaNmiGaY-lEnvtCFRCNxTuEi9vLVrlf9XBQQiV63dQ1B35odMHAgEToWGZ3KxABHx8m0QC8-NOvTimFJtH_rb54BcGjP7a-iR3W8DVd3f9xX4Mr-HK5wJOWZvtakQiea9CvD663NMZ8YaZMY9PvvRhBphYG-9O1i3p-Sn0C6D9Yi5I2LMSeMtcvgSUCM3G1aqaoJkpGcuUj9_izd0NUSaUH0xvkdPYCPWZrKnytAnkeFUMebbOkEyU0SovvjAtJeyYq8UcF5-LfPyua64MNSvg63Q9bkR1T_--X5Jky4WIiEBLnuz2pOiCvxXW8i-SbQy81z-yJjnyhP1JaM79Xi3xrW2_hdunhmCEnTQmuRcW-qXX7fN3pJULfb1wd_y1Y5dOK3Pm_gmM2BLg-vG_ALKyzJgfNcI2sHOXzw8wpBLGlyDITnFvZIFYdcRyu-5u6donWmfROpI5cvzP1qkVVpnSgyZJmmNs3JxrGtbyvYf0ihLY0OC-JZ0GWVgErZLSEt_hQnbwvON3cAXtvlUZW7CZSdD_TukfOfG4SebBIR3Lm0G4S1bZ--EdpxWW1OgNe6wS_y_qnJFRnGpZEBB5z1gW_mCXa2qAUScP3MXWwej2H9ykb9YCCeQSFRkYn1MnRuncE06WhIgRPmknAeLDubvOOqsgb5oLPBHGOcyBmeDOchJ_Tx7-ab0pAx8uUeAeOrkmhqqvj4rzB_7J2mFpk46E2GDZrf3JKoGlbiVeCd8=w1039-h976-no?authuser=3)


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

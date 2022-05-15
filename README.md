# Meadow
Meadow is a laravel package used for instant admin panel.

## Important
This package should only be installed into new Laravel applications. Attempting to install into an existing Laravel application will result in unexpected behavior and issues.

## Installation

You can install the package via composer:

``` bash
composer require ajaycalicut17/meadow --dev
```

Run artisan command for installation:

``` bash
php artisan meadow:install
```

Run npm

``` bash
npm install && npm run dev
```

Database migration

``` bash
php artisan migrate --seed
```

## Default Admin Credential

Email
``` bash
admin@gmail.com
```
Password
``` bash
12345678
```

## Features

 - [Authentication](https://laravel.com/docs/fortify#authentication)
 - [Two Factor Authentication](https://laravel.com/docs/fortify#two-factor-authentication)

  Enable two factor authentication feature in config/fortify.php
  ```code
  Features::twoFactorAuthentication([
   'confirm' => true,
   'confirmPassword' => true,
  ]),
  ```
  Ensure App\Models\User model uses the Laravel\Fortify\TwoFactorAuthenticatable trait.
  ```code
  use Laravel\Fortify\TwoFactorAuthenticatable;

  class User extends Authenticatable
  {
    use TwoFactorAuthenticatable;
  ```
  
 - [Registration](https://laravel.com/docs/fortify#registration)
 - [Password Reset](https://laravel.com/docs/fortify#password-reset)
 - [Email Verification](https://laravel.com/docs/fortify#email-verification)
  
  Enable email verification feature in config/fortify.php
  ```code
  Features::emailVerification(),
  ```
  Ensure App\Models\User class implements the Illuminate\Contracts\Auth\MustVerifyEmail interface.
  ```code
  use Illuminate\Contracts\Auth\MustVerifyEmail;

  class User extends Authenticatable implements MustVerifyEmail
  {
  ```
  To specify that a route or group of routes requires that the user has verified their email address, you should attach verified middleware to the route.
  ```code
  Route::view('/home', 'home.index')->name('home')->middleware('verified');
  ```
  
 - [Password Confirmation](https://laravel.com/docs/fortify#password-confirmation)

  To specify that a route or group of routes requires that the user has confirmed their current password, you should attach password.confirm middleware     to the route.
  ```code
  Route::view('/home', 'home.index')->name('home')->middleware('password.confirm');
  ```
  
## Dependents

 - [Laravel](https://laravel.com)
 - [Laravel Fortify](https://laravel.com/docs/fortify)
 - [Tailwind CSS](https://tailwindcss.com)
 - [Alpine.js](https://alpinejs.dev)
 - [Windmill Dashboard HTML](https://windmillui.com/dashboard-html)

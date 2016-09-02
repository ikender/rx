# RX Savings Solutions Code Challenge

This is a rework of the code challange, presented by RX Savings solutions.  My original was not as advanced as I liked, so I figured I would redo it in a Laravel environment.

## Installation

After you have the files downloaded, you will need to comment out line 156 of the config file

`config/app.php`
```
//        Rutorika\Html\HtmlServiceProvider::class,
```

Please don't forget to update/create your `.env`, use `.env.example` as a base

Once that is done, run the following commands (this will set up your database and download any required files)
```
composer install
php artisan migrate:refresh --seed
```

## Update

this requires 1 modification to a vendor file, unfortunate, but the code was written for Laravel 5.1 and this is 5.2 where bindShared() is depricated

`vendor/rutorika/laravel-html/src/HtmlServiceProvider.php`
```
 -        $this->app->bindShared('form', function ($app) {
 -            $form = new FormBuilder($app['html'], $app['url'], $app['session.store']->getToken());
 +        $this->app->singleton('form', function ($app) {
 +            $form = new FormBuilder($app['html'], $app['url'], $app['view'], $app['session.store']->getToken());
```

Once done, uncomment the line commented above 

`config/app.php`
```
        Rutorika\Html\HtmlServiceProvider::class,
```

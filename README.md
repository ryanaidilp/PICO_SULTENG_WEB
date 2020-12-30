<h1 align="center"> PICO SulTeng WEB </h1>

![PICO SulTeng WEB](https://i.ibb.co/8b5cFjL/newpico.jpg)

[PICO SulTeng WEB](https://banuacoders.com/corona) is the web version of PICO SulTeng (*Pusat Informasi COVID-19 Sulawesi Tengah*/COVID-19 Information Center of Central Sulawesi). It is built using [Laravel](https://laravel.com/), [Vue.js](https://vuejs.org), [Tailwind CSS](https://tailwindcss.com), & [Inertia Js](https://inertiajs.com).  This website is built to facilitate the people of Central Sulawesi in obtaining information about the current situation of COVID-19 in Central Sulawesi.

## Configuration

This website is designed to be deployed to a sub-folder on shared hosting.

To run this website on your local machine, follow these instruction carefully :

* **Deploy instruction**
  * Clone this repository to your PC/laptop.
  * Open terminal/CMD then go to the **root directory** of the clone results.
  * Run this command `cp .env.example .env`
  * Run `composer install` / `composer update` & `npm install` command to install all required dependencies.
  * Run `php artisan migrate` to create fresh database and tables with empty data

* **Deploy using artisan command**
  * Just run `php artisan serve` from your terminal

* **Deploy on XAMPP**
  * Create a new directory in **htdocs**
  * Copy all files and directories in the public folder to the root folder in the directory you just created
  * Create a new directory in the directory that you just created then copy all the cloned files except the public folder to that directory
  * Modify your index.php 

    ```php
        require __DIR__.'/../<new-dir-you-just-created>/vendor/autoload.php';

        /*
        |--------------------------------------------------------------------------
        | Run The Application
        |--------------------------------------------------------------------------
        |
        | Once we have the application, we can handle the incoming request using
        | the application's HTTP kernel. Then, we will send the response back
        | to this client's browser, allowing them to enjoy our application.
        |
        */
        $app = require_once __DIR__.'/../<new-dir-you-just-created>/bootstrap/app.php';

    ```

## Disclaimer

  Support me by following this account or starring this repository

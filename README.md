# Dashboard COVID-19 Sulawesi Tengah

![Dashboard COVID-19](https://i.ibb.co/cxHmXvH/image.png)

Dashboard COVID-19 SulTeng is the web version of PICO SulTeng (*Pusat Informasi COVID-19 Sulawesi Tengah*/COVID-19 Information Center of Central Sulawesi). It was built on Laravel and Vue.js + Tailwind CSS.  This website is built to facilitate the people of Central Sulawesi in obtaining information about the current situation of COVID-19 in Central Sulawesi.

## Configuration

This app is designed to deploy on shared hosting, so you can not run it with `php artisan serve` command. To run this app on your local machine, follow these instruction carefully :

* **Deploy on XAMPP**

  * Clone this repository to your PC/laptop.
  * Open terminal/CMD then go to the **root directory** of the clone results.
  * Run this comman `cp .env.example .env` 
  * Run `composer install` / `composer update` & `npm install` command to install all required dependencies.
  * After the dependency installation process is complete, run `php artisan key:generate` command to generate **APP_KEY**.
  * Run `php artisan migrate` to create fresh database and tables with empty data or just import **SQL file** under the **database** directory.
  * Copy app directory to **xampp/htdocs** then rename the root directory to **corona**.
  * Now app can be access via **localhost/corona**.

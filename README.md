Installation
Clone the Repo:
> git clone https://github.com/bishwozz/Laravel_Livewire_Blog.git
> cd laravel_blog
> composer install or composer update
> cp .env.example .env
> Set up .env file
> php artisan key:generate
> php artisan storage:link
> php artisan migrate:fresh --seed
> php artisan serve
http://127.0.0.1:8000/

## About

LARAVEL BLOG is a Laravel [Netflix](https://netflix.com) clone project using TALL stack ([Tailwindcss](https://tailwindcss.com/), [Alpinejs](https://github.com/alpinejs/alpine/), [Laravel](https://laravel.com/), [Livewire](https://laravel-livewire.com/) ).



## Installation

> **Warning**
> Make sure to follow the requirements first.

Here is how you can run the project locally:
1. Clone this repo
    ```sh
    git clone https://github.com/bishwozz/Laravel_Livewire_Blog.git
    ```

1. Go into the project root directory
    ```sh
    cd Laravel_Livewire_Blog
    ```

1. Copy .env.example file to .env file
    ```sh
    cp .env.example .env
    ```
1. Create database `Laravel_Blog` (you can change database name)


1. Go to `.env` file 
    - set database credentials (`DB_DATABASE=laravel_blog`, `DB_USERNAME=root`, `DB_PASSWORD=`)
    > Make sure to follow your database username and password

1. Install PHP dependencies 
    ```sh
    composer install
    ```

1. Generate key 
    ```sh
    php artisan key:generate
    ```

1. Run migration
    ```
    php artisan migrate
    ```
    
1. Run seeder
    ```
    php artisan db:seed
    ```
    this command will create 2 users (admin and normal user):
     > email: admin@gmail.com , password: 111

     > email: user@gmail.com , password: 111 

1. Run server 
    >  visit `laravel_blog.test` in your favorite browser in setup in xampp or laragon
   
    ```sh
    php artisan serve
    ```  

1. Visit `localhost:8000` in your favorite browser.     

    > Make sure to follow your Laravel local Development Environment.


1. Login credentials
    ```
     > email: admin@gmail.com , password: password , Username/User : admin 

     > email: user@gmail.com , password: password 
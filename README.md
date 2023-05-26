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
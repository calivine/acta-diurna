**Acta-Diurna** is a video clip hosting service using the [Laravel Framework](https://github.com/laravel/laravel).

#### Installation
1. Built vendor directory with `composer install` in development and `composer install --no-dev` in production. 
1. Create virtual host block in `/etc/apache2/sites-enabled/000-default.conf` or create your own `*.conf` file in the same directory. 
1. `cp .env.example .env` to copy initialize configuration.
1. Generate an app key `php artisan key:generate`
1. Run migrations to build tables
1. Add storage file structure `cd /storage/app/public/` then `mkdir videos` `mkdir gifs` `mkdir thumbnails`
1. Set permissions: `chown -R www-data .` and `sudo chown -Rf www-data:www-data /var/www/html/*`
#### Reminders
1. Install `ffmpeg` for multimedia assets to work. Update `LIB_FFMPEG` in your `.env` file with the path to `ffmpeg` (usually `/usr/bin/ffmpeg` on Ubuntu)

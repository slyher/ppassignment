## PPassignment
### install
$ composer install

$cp ./.env.example ./.env

mysql> create database homestead;-- for efault database in .env file 

$ vim ./.env

Or use Your favorite text editor to configure Your database accordingly.

Check if Your database is configured and running and database exists.

$ php artisan migrate

Make sure that configs for town are set properny in .env file, as bellow.

GDANSK_DISTRICTS_URL=https://www.gdansk.pl/%id%

GDANSK_DISTRICTS_LIST_URL=https://www.gdansk.pl/matarnia

GDANSK_TOWN_NAME=Gdańsk

CRACOW_DISTRICTS_URL=http://appimeri.um.krakow.pl/app-pub-dzl/pages/DzlViewGlw.jsf?id=%id%&lay=&fo=&submit=Wybierz

CRACOW_DISTRICTS_LIST_URL=http://appimeri.um.krakow.pl/app-pub-dzl/pages/DzlViewAll.jsf?a=1&lay=&fo=

CRACOW_TOWN_NAME=Kraków

$ php artisan key:generate

### get districts
$ php artisan fetch:districts-all
### run the CMS
$ php artisan serve


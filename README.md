# realtime chat app without using pusher

Nowadays Realtime something required in your application.
so i decided to create a small chat application one using laravel vuejs and laravel-echo-server .

# installing stuffs 
To begin, we have to install the laravel-echo-server package globally, you can do so by executing this in your terminal.
```sh
$ npm install -g laravel-echo-server
```
install php packages 

```sh
$ composer install
```
install javascript packages

```sh
$ npm install
```
create database then update  .env file don't forget to change these params (or rename .env.example -> .env )

```sh
BROADCAST_DRIVER=redis
QUEUE_DRIVER=redis
```
i think we are done here .
   let's start laravel-echo-serve
```sh
$ laravel-echo-server start
```
start server
```sh
$ php artisan serve
```

> i hope you like it



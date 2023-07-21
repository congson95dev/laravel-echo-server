# Laravel websocket

## This project is followed by this tutorial

https://www.youtube.com/watch?v=DIA1CJhH9dk&list=PLSfH3ojgWsQosqpQUc28yP9jJZXrEylJY&index=49&pp=iAQB

there's 3 type of channels:

public, presence, private

public: no auth, every one can access this channel

presence: auth, user can access other user channel

private: auth, user can only access their own channel and can't access to other user channel

Note: To setup private channel, we need to implement an authenticate system for the project

Tutorial for private channel: https://www.youtube.com/watch?v=5uVAJ250Wgw

`composer require laravel/breeze`

`php artisan migrate`

`php artisan breeze:install`

`npm install`

`npm run dev`

Now we can continue to implement the laravel websocket with private channel 

`composer require beyondcode/laravel-websockets`

`php artisan vendor:publish` => pick beyondcode/laravel-websockets

`composer require doctrine/dbal` (install this if running migrate command raise error)

`php artisan migrate`

`composer require pusher/pusher-php-server:7.0.2` (this version is more stable)

run `php artisan websockets:serve`

and go to http://127.0.0.1/laravel-websockets

https://www.youtube.com/watch?v=NMstI0hghnE&list=PLSfH3ojgWsQosqpQUc28yP9jJZXrEylJY&index=50

run `php artisan make:event ChatEvent`

set the event to `implements ShouldBroadcast`

https://www.youtube.com/watch?v=rzZoswkfi90&list=PLSfH3ojgWsQosqpQUc28yP9jJZXrEylJY&index=51

`npm i laravel-echo pusher-js@7.6`

`npm run hot`
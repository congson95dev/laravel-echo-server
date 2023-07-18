# Laravel websocket

## This project is followed by this tutorial

https://www.youtube.com/watch?v=DIA1CJhH9dk&list=PLSfH3ojgWsQosqpQUc28yP9jJZXrEylJY&index=49&pp=iAQB

`composer require beyondcode/laravel-websockets`

`php artisan vendor:publish` => pick beyondcode/laravel-websockets

`composer require doctrine/dbal` (install this if running migrate command raise error)

`php artisan migrate`

`composer require pusher/pusher-php-server:7.0.2` (this version is more stable)

run `php artisan websockets:serve`

and go to http://mylaravelapp.com/laravel-websockets

https://www.youtube.com/watch?v=NMstI0hghnE&list=PLSfH3ojgWsQosqpQUc28yP9jJZXrEylJY&index=50

there's 3 type of channels:

public, presence, private

public: no auth, every one can access this channel

presence: auth, user can access other user channel

private: auth, user can only their own channel and can't access to other user channel

run `php artisan make:event PlaygroundEvent`

set the event to `implements ShouldBroadcast`

https://www.youtube.com/watch?v=rzZoswkfi90&list=PLSfH3ojgWsQosqpQUc28yP9jJZXrEylJY&index=51

`npm i laravel-echo pusher-js@7.6`
`npm run hot`

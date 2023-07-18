<?php

use App\Events\ChatEvent;
use App\Events\PlaygroundEvent;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// playground will be the publisher
Route::get('/playground', function () {
    event(new PlaygroundEvent);

    return null;
});

// ws will be the receiver
Route::get('/ws', function () {
    return view('websocket');
});

Route::post('/chat-message', function (Request $request) {
    event(new ChatEvent($request->message));

    return null;
});
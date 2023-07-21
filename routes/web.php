<?php

use App\Events\ChatEvent;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// ws will be the receiver
Route::get('/ws', function () {
    return view('websocket');
});

Route::post('/chat-message', function (Request $request) {
    event(new ChatEvent($request->message, auth()->user()));

    return null;
});
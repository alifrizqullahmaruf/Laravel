<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Ini ketika user masuk ke link dari serve maka kan menampilkan view welcome
Route::get('/', function () {
    return view('welcome');
});

// Ketika user jalankan maka akan muncul 'Hello, welcome to Laravel!'
Route::get('/welcome', function () {
    return 'Hello, welcome to Laravel!';
});

// Ini sama seperti defoultnya, namun di buat menjadi lebih singkat
Route::view('/welcome', 'welcome');

// Jika user mmenginputkan "/greet/Alif" maka akan muncuk teks 'Hello, Selamt siang Boss ' . $name . '!', unutk namenya sendiri itu sesuai dengan data yang diinputkan user
Route::get('/greet/{name}', function ($name) {
    return 'Hello, Selamt siang Boss ' . $name . '!';
});

// Ini adalam route yang paling banyak di jelaskan karena logic aplikasinya (controllernya) akan di panggil dari sini.
// dari route ini user akan mengambil method show dari usercontroller
Route::get('/user/{id}', 'UserController@show');

// ketika user click masuk ke page ini maka akan langsung di arahkan ke "new-url"
Route::redirect('/old-url', '/new-url');

// ini sama seperti di atas ketika user menginputkan "iser/12" maka akan menampilkan "User ID: 12"
Route::get('/user/{id}', function ($id) {
    return 'User ID: ' . $id;
});

// nah ini sangat memudah kan pengguna jika pengguna memiliki route yang sama pada awalnya "admin/welcome" misalnya
Route::prefix('admin')->group(function () {
    Route::view('/welcome', 'welcome');
    Route::get('/settings', 'AdminController@settings');
});
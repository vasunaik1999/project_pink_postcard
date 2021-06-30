<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('frontend.home');
// });
Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

//Auth Routes
Route::group(['middleware' => ['auth']], function () {
});

//ADMIN && SUPERADMIN ROUTES
Route::group(['middleware' => ['auth', 'role:admin|superadmin']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

//User Routes
Route::group(['middleware' => ['auth', 'role:user']], function () {
    // Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

require __DIR__ . '/auth.php';

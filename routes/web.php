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
//Dashboard
Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

//Contact Form
Route::post('/contactform/submit', 'App\Http\Controllers\ContactFormController@store')->name('contactform.store');

//Postcards
Route::get('/postcards', 'App\Http\Controllers\PostcardController@index')->name('postcard.index');
//Route::get('/postcard-preview/{postcard}', 'App\Http\Controllers\PostcardController@preview')->name('postcard.preview');

//Auth Routes
Route::group(['middleware' => ['auth']], function () {
    Route::post('/payment', 'App\Http\Controllers\OrderController@store')->name('order.store');
    //Route::get('/payment-details', 'App\Http\Controllers\OrderController@paymentDetails')->name('order.paymentDetails');

    //Postcard Preview
    Route::get('/postcard-preview/{postcard}', 'App\Http\Controllers\PostcardController@preview')->name('postcard.preview');
});

//ADMIN && SUPERADMIN ROUTES
Route::group(['middleware' => ['auth', 'role:admin|superadmin']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

    //Postcard
    Route::get('/dashboard/postcards-view', 'App\Http\Controllers\PostcardController@view')->name('postcard.view');
    Route::get('/dashboard/postcard-create', 'App\Http\Controllers\PostcardController@create')->name('postcard.create');
    Route::post('/dashboard/postcard-store', 'App\Http\Controllers\PostcardController@store')->name('postcard.store');
    Route::get('/dashboard/postcard-edit/{postcard}', 'App\Http\Controllers\PostcardController@edit')->name('postcard.edit');
    Route::put('/dashboard/postcard-update/{postcard}', 'App\Http\Controllers\PostcardController@update');

    //Contact form
    Route::get('/dashboard/contactform-responses', 'App\Http\Controllers\ContactFormController@index')->name('contactform.index');
    Route::post('/dashboard/contactform-responses/status', 'App\Http\Controllers\ContactFormController@updatestatus')->name('contactform.update.status');

    //Orders
    Route::get('/dashboard/orders', 'App\Http\Controllers\OrderController@index')->name('order.index');
    Route::post('/dashboard/orders/updateStatus', 'App\Http\Controllers\OrderController@updateStatus')->name('order.updateStatus');
});

//User Routes
Route::group(['middleware' => ['auth', 'role:user']], function () {
    // Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

require __DIR__ . '/auth.php';

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/complete-registration', 'Auth\RegisterController@completeRegistration');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/2fa', function () {
    return redirect(URL()->previous());
})->name('2fa')->middleware('2fa');

Route::get('/profile','HomeController@profile')->name('profile');
Route::get('/about','HomeController@about')->name('about');

Route::get('/reauthenticate', 'HomeController@reauthenticate');

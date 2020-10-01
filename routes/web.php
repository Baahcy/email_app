<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

use App\Mail\SendEmail;

use Illuminate\Support\Facades\Mail;

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
//     return view('welcome');
// });

Route::get('/', 'ContactController@index');

Route::post('/contactus/store', 'ContactController@store')->name('contactus-store');

// Route::get('/send-mail', function () {

//     Mail::to('journalist@example.com')->send(new SendEmail());

//     return redirect('/')->with('success', 'Message sent successfully');

// });

// Route::get('/send-mail', 'ContactController@sendmail')->name('sendmail');




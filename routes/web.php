<?php

use App\Http\Controllers\ScrapyController;
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

// Route::resource('/scrapy', ScrapyController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('/{all:.*}', ScrapyController::class);

Route::get("{path?}", [ScrapyController::class, 'index'])->where('path', '.+');
// Route::any('(:any)/(:all?)', 'ScrapyController@index');
// Route::any( '(.*)', 'ScrapyController@index');

// Route::resource('{slug}', ScrapyController::class)->where('slug', '([A-z\d-\/_.]+)?');

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

//Route::get('/{any}', 'App\Http\Controllers\PagesController@index')->where('any', '.*');

// Route::get('/{any?}', function(){
//     return view('welcome');
// });
Route::any('{all}',function(){
    return view('welcome'); // it should be main blade file
})
->where('all', '^(?!api).*$')
->where('all', '^(?!storage).*$');

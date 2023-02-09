<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SearchController;

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

/*Route::get('/', function () {
    return view('main')->with("recent", IndexController::getRecent())->with('tags', [1,2,3]);
});*/

Route::get('/', [IndexController::class, "getMain"])->name('main');

Route::get('/test', function () {
    return view('welcome');
});
Route::get('/book/{id}', [BooksController::class, "show"])->name('book');
Route::get('/download/{id}', [BooksController::class, "download"]);
//Route::get('/search/', [SearchController::class, "get"]);
Route::get('/search/', [SearchController::class, "search"])->name("search");

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MacLookupController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/mac-lookup', [MacLookupController::class, 'lookup'])->name('mac-lookup');

Route::get('/mac-lookup-result', [MacLookupController::class, 'showForm'])->name('mac-lookup-result');
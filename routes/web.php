<?php

use App\Http\Controllers\Controller;
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
// REDIRECT TO KARTONI ROUTE
Route::get('/home', function () {
    return redirect('/kartoni');
});
Route::get('/', function () {
    return redirect('/kartoni');
});

// USER VERIFYCATION
Auth::routes([
    'verify' => true
]);

// AUTH MIDDLEWARRE
Route::middleware('auth')->group(function () {
    Route::get('/kartoni', [App\Http\Controllers\RecordController::class, 'record'])->middleware(['verified'])->name('kartoni');
});

// ADMIN MIDDLEWARE
Route::middleware(['admin'])->group(function () {
});


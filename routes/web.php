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
    Route::post('/kartoni/lista-kartona', [App\Http\Controllers\RecordController::class, 'recordTable'])->name('lista-kartona');
    Route::post('/kartoni/patientData', [App\Http\Controllers\RecordController::class, 'patientData'])->name('patientData');
    Route::post('/kartoni/deletePatient', [App\Http\Controllers\RecordController::class, 'deletePatient'])->name('deletePatient');
});

// ADMIN MIDDLEWARE
Route::middleware(['admin'])->group(function () {
});


<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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
    Route::post('saveNewPatient', [App\Http\Controllers\AddPatientController::class, 'saveNewPatient'])->name('saveNewPatient');
    Route::post('/kartoni/deletePatient', [App\Http\Controllers\RecordController::class, 'deletePatient'])->name('deletePatient');
    Route::get('/download/{filename}', function ($filename) {
        $path = storage_path("app/illness_history/{$filename}");
    
        if (!file_exists($path)) {
            abort(404); // File not found
        }
    
        return response()->download($path);
    })->name('download.file');
    
});

// ADMIN MIDDLEWARE
Route::middleware(['admin'])->group(function () {
});


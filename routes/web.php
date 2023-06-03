<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PatientDocumentsController;
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
// Auth::routes();
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);
Route::get('/', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    //Profile Update Route
    Route::post('/profile-store', [HomeController::class, 'store'])->name('profile.store');
    Route::get('change-mode', [HomeController::class, 'changeMode'])->name('mode-change');

    Route::group(['prefix' => 'department'], function () {
        Route::get('/list', [DepartmentController::class, 'index'])->name('department.index');
        Route::get('/status/{id}', [DepartmentController::class, 'status'])->name('department.status');
        Route::post('store', [DepartmentController::class, 'store'])->name('department.store');
        Route::get('edit/{id}', [DepartmentController::class, 'edit']);
        Route::post('update', [DepartmentController::class, 'update'])->name('department.update');
        Route::delete('destroy/{id}', [DepartmentController::class, 'destroy'])->name('department.destroy');
    });
    Route::group(['prefix' => 'doctor'], function () {
        Route::get('/list', [DoctorController::class, 'index'])->name('doctor.index');
        Route::get('/create', [DoctorController::class, 'create'])->name('doctor.create');
        Route::get('/status/{id}', [DoctorController::class, 'status'])->name('doctor.status');
        Route::get('/show/{id}', [DoctorController::class, 'show'])->name('doctor.show');
        Route::post('store', [DoctorController::class, 'store'])->name('doctor.store');
        Route::get('edit/{id}', [DoctorController::class, 'edit'])->name('doctor.edit');
        Route::post('update/{id}', [DoctorController::class, 'update'])->name('doctor.update');
        Route::delete('destroy/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');
    });
    Route::group(['prefix' => 'patient'], function () {
        Route::get('/list', [PatientController::class, 'index'])->name('patient.index');
        Route::get('/create', [PatientController::class, 'create'])->name('patient.create');
        Route::get('/status/{id}', [PatientController::class, 'status'])->name('patient.status');
        Route::get('/show/{id}', [PatientController::class, 'show'])->name('patient.show');
        Route::post('store', [PatientController::class, 'store'])->name('patient.store');
        Route::get('edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');
        Route::post('update/{id}', [PatientController::class, 'update'])->name('patient.update');
        Route::delete('destroy/{id}', [PatientController::class, 'destroy'])->name('patient.destroy');
    }); 

    Route::resource('/schedule', ScheduleController::class);
    
    Route::group(['prefix' => 'schedule'], function() {
        Route::get('/status/{id}', [ScheduleController::class, 'status'])->name('schedule.status');
    });
    Route::group(['prefix' => 'patient-documents'], function () {
        Route::get('/list', [PatientDocumentsController::class, 'index'])->name('documents.index');
        Route::get('/show/{id}', [PatientDocumentsController::class, 'show'])->name('documents.show');
        Route::post('store', [PatientDocumentsController::class, 'store'])->name('documents.store');
        Route::delete('destroy/{id}', [PatientDocumentsController::class, 'destroy'])->name('documents.destroy');
    });
});
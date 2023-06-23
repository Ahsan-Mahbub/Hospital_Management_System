<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PatientDocumentsController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DataGetController;
use App\Http\Controllers\PrescriptionController;

// Auth::routes();
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);
/*
|--------------------------------------------------------------------------
| Data Get Routes List
|--------------------------------------------------------------------------
*/
Route::get('/get-doctor/{id}', [DataGetController::class, 'getDoctor']);
Route::get('/get-doctor-schedule/{id}', [DataGetController::class, 'getDoctorSchedule']);
Route::get('/get-doctor-date-schedule/{id}/{date}', [DataGetController::class, 'getDoctorDateSchedule']);
/*
|--------------------------------------------------------------------------
| Admin Routes List
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth', 'user-access:admin'])->group(function() {
    Route::prefix('admin')->group(function() {
        Route::get('/dashboard', [HomeController::class, 'adminDashbord'])->name('admin.dashboard');

        Route::group(['prefix' => 'department'], function () {
            Route::get('/list', [DepartmentController::class, 'index'])->name('department.index');
            Route::get('/status/{id}', [DepartmentController::class, 'status'])->name('department.status');
            Route::post('store', [DepartmentController::class, 'store'])->name('department.store');
            Route::get('edit/{id}', [DepartmentController::class, 'edit']);
            Route::post('update', [DepartmentController::class, 'update'])->name('department.update');
            Route::delete('destroy/{id}', [DepartmentController::class, 'destroy'])->name('department.destroy');
        });

        Route::resource('/schedule', ScheduleController::class);
        Route::group(['prefix' => 'schedule'], function() {
            Route::get('/status/{id}', [ScheduleController::class, 'status'])->name('schedule.status');
        });
    
    });
});

/*
|--------------------------------------------------------------------------
| Common Routes List
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'can:admin-or-doctor-access'])->group(function () {

    Route::post('/profile-store', [HomeController::class, 'store'])->name('profile.store');
    Route::get('change-mode', [HomeController::class, 'changeMode'])->name('mode-change');

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

        Route::group(['prefix' => 'documents'], function () {
            Route::get('/list', [PatientDocumentsController::class, 'index'])->name('documents.index');
            Route::get('/show/{id}', [PatientDocumentsController::class, 'show'])->name('documents.show');
            Route::post('store', [PatientDocumentsController::class, 'store'])->name('documents.store');
            Route::delete('destroy/{id}', [PatientDocumentsController::class, 'destroy'])->name('documents.destroy');
        });
    }); 

    Route::group(['prefix' => 'appointment'], function () {
        Route::get('/list', [AppointmentController::class, 'index'])->name('appointment.index');
        Route::get('/create', [AppointmentController::class, 'create'])->name('appointment.create');
        Route::get('/show/{id}', [AppointmentController::class, 'show'])->name('appointment.show');
        Route::post('store', [AppointmentController::class, 'store'])->name('appointment.store');
        Route::delete('destroy/{id}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');
    });

    Route::group(['prefix' => 'case-study'], function () {
        Route::get('/list', [PrescriptionController::class, 'index'])->name('prescription.index');
        Route::get('/create', [PrescriptionController::class, 'create'])->name('prescription.create');
        Route::get('/status/{id}', [PrescriptionController::class, 'status'])->name('prescription.status');
        Route::get('/show/{id}', [PrescriptionController::class, 'show'])->name('prescription.show');
        Route::post('store', [PrescriptionController::class, 'store'])->name('prescription.store');
        Route::get('edit/{id}', [PrescriptionController::class, 'edit'])->name('prescription.edit');
        Route::post('update/{id}', [PrescriptionController::class, 'update'])->name('prescription.update');
        Route::delete('destroy/{id}', [PrescriptionController::class, 'destroy'])->name('prescription.destroy');
    });

});

/*
|--------------------------------------------------------------------------
| Doctor Routes List
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'user-access:doctor'])->prefix('doctor')->group(function() {
    Route::get('/dashboard', [HomeController::class, 'doctorDashbord'])->name('doctor.dashboard');
});
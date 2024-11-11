<?php

use App\Http\Controllers\Dashboard\AppointmentsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ExpensesController;
use App\Http\Controllers\Dashboard\PatientsController;
use Illuminate\Support\Facades\Route;

////////// Dashboard //////////
Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');

////////// patints //////////
Route::resource('dashboard/patients', PatientsController::class);

////////// Appointments //////////
Route::resource('dashboard/appointments', AppointmentsController::class);

////////// Expenses //////////
Route::resource('dashboard/expenses', ExpensesController::class);

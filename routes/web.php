<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TrackOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(TrackOrderController::class)->group(function () {
    Route::get('/track-order', 'index')->name('track-order');

    Route::post('/track-order', 'showOrderStatus');
});

Route::redirect('/', 'track-order');

Route::middleware(['auth', 'user-role:Administrator'])->group(function () {
  // Users CRUD
  Route::resource('users', UserController::class)->except('show');

  // Invoices CRUD
  Route::resource('invoices', InvoiceController::class);

  // Materials CRUD
  Route::resource('materials', MaterialController::class)->except('show');

  // Companies CRUD
  Route::resource('companies', CompanyController::class)->except('show');

  // Files CRUD
  Route::resource('files', FileController::class);
});

Route::middleware('auth')->group(function () {
  // Dashboard
  Route::get('/dashboard', function() {
    return view('dashboard');
  })->name('dashboard');

  // Invoices CRUD
  Route::resource('invoices', InvoiceController::class)->except('show');

});

require __DIR__.'/auth.php';


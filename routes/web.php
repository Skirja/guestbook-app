<?php

use App\Http\Controllers\GuestBookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [GuestBookController::class, 'index'])->name('guestbook.index');
Route::post('/guestbook', [GuestBookController::class, 'store'])->name('guestbook.store');


Route::middleware('auth.admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Route untuk halaman login admin
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');

// Route untuk proses login admin
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');

// Route untuk logout admin
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Route untuk filter data berdasarkan tanggal
Route::post('/admin/dashboard/filter', [AdminController::class, 'filterByDate'])->name('admin.filter');

// Route untuk ekspor PDF
Route::get('/admin/dashboard/export-pdf', [AdminController::class, 'exportPDF'])->name('admin.export.pdf');

Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

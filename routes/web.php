<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MailController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Public Routes (Login, Register, Forgot Password)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset-password');

// Protected Routes (Only accessible if logged in)
Route::middleware(['auth'])->group(function () {
    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
    Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
    Route::get('/expenses/{id}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');
    Route::put('/expenses/{id}', [ExpenseController::class, 'update'])->name('expenses.update');

    Route::get('/event-users', [ExpenseController::class, 'eventUsers'])->name('event.users');
    Route::post('/event-users/update', [ExpenseController::class, 'updateUser'])->name('event.users.update');
    Route::post('/event-users/delete', [ExpenseController::class, 'deleteUser'])->name('event.users.delete');

    Route::get('/expenses/previous', [ExpenseController::class, 'previous'])->name('expenses.previous');
    Route::get('/expenses/after', [ExpenseController::class, 'after'])->name('expenses.after');
    Route::post('/room-masi-store', [ExpenseController::class, 'storeRoomMasi'])->name('room.masi.store');
    Route::put('/roommasi/update/{id}', [ExpenseController::class, 'updateRoomMasi'])->name('roommasi.update');
    Route::get('/room-masi', [ExpenseController::class, 'showRoomMasiPage'])->name('room.masi.page');

    Route::get('/expenses/after-summary-alt', [ExpenseController::class, 'afterAlt'])->name('expenses.after.alt');
    Route::get('/export-pdf', [ExpenseController::class, 'exportPdf'])->name('export.pdf');
    Route::get('/export-excel', [ExpenseController::class, 'exportExcel'])->name('export.excel');
    Route::post('/update-status', [ExpenseController::class, 'updateStatus']);
    Route::get('/expenses/download-previous', [ExpenseController::class, 'downloadPreviousMonthPDF'])->name('expenses.download.previous');
    Route::post('/expenses/previous', [ExpenseController::class, 'previous'])->name('expenses.previous.post');
    Route::get('/check-submission', [ExpenseController::class, 'checkSubmission'])->name('check.submission');

    Route::get('send-mail', [MailController::class, 'sendmail']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


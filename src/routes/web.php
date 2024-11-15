<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\Auth\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 会員登録
Route::get('/register', [RegisteredUserController::class, 'show'])->name('register.show'); // 表示用
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register'); // 登録用

// ログインホーム
Route::get('/', [AttendanceController::class, 'punch'])
    ->middleware(['auth', 'verified'])
    ->name('home');

// 打刻機能
Route::post('/work', [AttendanceController::class, 'work'])->name('work');

// ログアウト
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout.custom');

// 管理ページ / 日付別
Route::get('/attendance/date', [AttendanceController::class, 'indexDate'])->name('attendance/date');
Route::post('/attendance/date', [AttendanceController::class, 'perDate'])->name('per/date');

// 管理ページ / ユーザー別
Route::get('/attendance/user', [AttendanceController::class, 'indexUser'])->name('attendance/user');
Route::get('/attendance/user/{id}', [AttendanceController::class, 'perUser'])->name('attendance.user');

// 管理ページ / ユーザー一覧
Route::get('/user', [AttendanceController::class, 'user'])->name('user');

// メール確認通知を送信
Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/verification-notification', [VerificationController::class, 'resend'])->name('verification.send');

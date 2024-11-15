<?php

use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Manager\ManagerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', function () {
    return "Check";
})->name('login');


Route::get('/admin/login', [AdminDashboard::class, 'login'])->name('admin.login.form');
Route::post('admin/login', [AdminDashboard::class, 'loginAdmin'])->name('admin.login');
Route::get('admin/logout', [AdminDashboard::class, 'logout'])->name('admin.logout');

Route::get('/manager/login', [ManagerController::class, 'login'])->name('manager.login.form');
Route::post('manager/login', [ManagerController::class, 'loginManager'])->name('manager.login');
Route::get('manager/logout', [ManagerController::class, 'logout'])->name('manager.logout');

Route::middleware('admin')->group(function () {
    Route::get('admin/dashboard', [AdminDashboard::class, 'dashboard'])->name('admin.dashboard');

    Route::get('admin/settings', [AdminSettingsController::class, 'index'])->name('admin.settings.index');
    Route::post('admin/settings', [AdminSettingsController::class, 'update'])->name('admin.settings.update');

    Route::get('admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/{id}', [AdminUserController::class, 'show'])->name('admin.users.show');
    Route::put('admin/users/{id}/update', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::get('/admin/users/{id}/toggle-status', [AdminUserController::class, 'toggleStatus'])->name('admin.users.toggleStatus');
    Route::get('/admin/users/{id}/delete', [AdminUserController::class, 'destroy'])->name('admin.users.delete');

    Route::get('admin/notifications', [NotificationController::class, 'index'])->name('admin.notifications.index');
    Route::post('admin/notifications/update', [NotificationController::class, 'update'])->name('admin.notifications.update');
});


Route::middleware('manager')->group(function () {
    Route::get('manager/dashboard', [ManagerController::class, 'dashboard'])->name('manager.dashboard');

    Route::get('manager/settings', [ManagerController::class, 'settings'])->name('manager.settings.index');
    Route::post('manager/settings', [ManagerController::class, 'updateSettings'])->name('manager.settings.update');

});


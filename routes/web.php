<?php

use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Manager\FoodItemController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\VoucherController;
use App\Http\Controllers\SupportRequestController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/admin/login', [AdminDashboard::class, 'login'])->name('admin.login.form');
Route::post('admin/login', [AdminDashboard::class, 'loginAdmin'])->name('admin.login');
Route::get('admin/logout', [AdminDashboard::class, 'logout'])->name('admin.logout');

Route::get('/manager/login', [ManagerController::class, 'login'])->name('manager.login.form');
Route::post('manager/login', [ManagerController::class, 'loginManager'])->name('manager.login');
Route::get('manager/logout', [ManagerController::class, 'logout'])->name('manager.logout');


Route::get('login', [UserDashboardController::class, 'login'])->name('login');
Route::get('user/register', [UserDashboardController::class, 'register'])->name('user.register');
Route::post('user/register', [UserDashboardController::class, 'createUser'])->name('user.create');
Route::post('user/login', [UserDashboardController::class, 'loginUser'])->name('user.login');
Route::get('user/logout', [UserDashboardController::class, 'logout'])->name('user.logout');


Route::middleware('admin')->group(function () {
    Route::get('admin/dashboard', [AdminDashboard::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/generate/report', [AdminDashboard::class, 'generateReport'])->name('admin.generate.report');

    Route::get('admin/settings', [AdminSettingsController::class, 'index'])->name('admin.settings.index');
    Route::post('admin/settings', [AdminSettingsController::class, 'update'])->name('admin.settings.update');

    Route::get('admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/{id}', [AdminUserController::class, 'show'])->name('admin.users.show');
    Route::put('admin/users/{id}/update', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::get('/admin/users/{id}/toggle-status', [AdminUserController::class, 'toggleStatus'])->name('admin.users.toggleStatus');
    Route::get('/admin/users/{id}/delete', [AdminUserController::class, 'destroy'])->name('admin.users.delete');

    Route::get('admin/notifications', [NotificationController::class, 'index'])->name('admin.notifications.index');
    Route::post('admin/notifications/update', [NotificationController::class, 'update'])->name('admin.notifications.update');

    Route::post('support/{id}/reply', [SupportRequestController::class, 'reply'])->name('support.reply');
    Route::group(['prefix' => 'support'], function () {

        // List all support requests
        Route::get('/', [SupportRequestController::class, 'index'])
            ->name('support.index');


        // Show single support request
        Route::get('/{support}', [SupportRequestController::class, 'show'])
            ->name('support.show');

        // Show edit form
        Route::get('/{support}/edit', [SupportRequestController::class, 'edit'])
            ->name('support.edit');

        // Update support request
        Route::put('/{support}', [SupportRequestController::class, 'update'])
            ->name('support.update');

        // Delete support request
        Route::delete('/{support}', [SupportRequestController::class, 'destroy'])
            ->name('support.destroy');
    });
});


Route::middleware('manager')->group(function () {
    Route::get('manager/dashboard', [ManagerController::class, 'dashboard'])->name('manager.dashboard');

    Route::get('manager/settings', [ManagerController::class, 'settings'])->name('manager.settings.index');
    Route::post('manager/settings', [ManagerController::class, 'updateSettings'])->name('manager.settings.update');

    Route::get('manager/fooditems', [FoodItemController::class, 'index'])->name('manager.fooditems.index'); // View all food items
    Route::get('manager/fooditems/new', [FoodItemController::class, 'create'])->name('manager.fooditems.new'); // Create new food items
    Route::post('manager/fooditems/store', [FoodItemController::class, 'store'])->name('manager.fooditems.store'); // Store a specific food item
    Route::get('manager/fooditems/{id}', [FoodItemController::class, 'show'])->name('manager.fooditems.show'); // View a specific food item
    Route::get('manager/fooditems/{id}/edit', [FoodItemController::class, 'edit'])->name('manager.fooditems.edit'); // Edit a specific food item
    Route::put('manager/fooditems/{id}', [FoodItemController::class, 'update'])->name('manager.fooditems.update'); // Update a specific food item
    Route::delete('manager/fooditems/{id}', [FoodItemController::class, 'destroy'])->name('manager.fooditems.delete'); // Delete a specific food item

    Route::get('manager/voucher', [VoucherController::class, 'index'])->name('manager.vouchers.index');
    Route::get('manager/voucher/{id}', [VoucherController::class, 'show'])->name('manager.vouchers.show');
    Route::get('manager/voucher/generate/new', [VoucherController::class, 'create'])->name('manager.vouchers.generate');
    Route::post('manager/voucher/store', [VoucherController::class, 'store'])->name('manager.vouchers.store');
    Route::put('manager/voucher/{id}', [VoucherController::class, 'update'])->name('manager.vouchers.update');
    Route::delete('manager/voucher/{id}', [VoucherController::class, 'destroy'])->name('manager.vouchers.delete');

    Route::group(['prefix' => 'help'], function () {

        // Show create form
        Route::get('/create', [SupportRequestController::class, 'create'])
            ->name('support.create');

        // Store new support request
        Route::post('/', [SupportRequestController::class, 'store'])
            ->name('support.store');
    });

    Route::get('manager/dashboard/announcement', [ManagerController::class, 'announcement'])->name('manager.announcement');
    
});

Route::middleware('auth')->group( function () {
    Route::get('user/dashboard', [UserDashboardController::class, 'dashboard'])->name('user.dashboard');

    Route::get('user/settings', [UserDashboardController::class, 'settings'])->name('user.settings.index');
    Route::post('user/settings', [UserDashboardController::class, 'updateSettings'])->name('user.settings.update');

    Route::group(['prefix' => 'help'], function () {
        // Show create form
        Route::get('/create', [UserDashboardController::class, 'createSupport'])
            ->name('user.support.create');

        // Store new support request
        Route::post('/', [SupportRequestController::class, 'store'])
            ->name('user.support.store');
    });

    Route::get('user/dashboard/announcement', [UserDashboardController::class, 'announcement'])->name('user.dashboard.announcement');
});
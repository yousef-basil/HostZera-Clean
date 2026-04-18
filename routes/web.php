<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminSyncController;
use App\Http\Controllers\Admin\AdminUserController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

// ─── Service Pages (Integrated) ───────────────────
Route::prefix('services')->group(function () {
    Route::get('/web-hosting', [\App\Http\Controllers\ServiceDisplayController::class, 'webHosting'])->name('services.web-hosting');
    Route::get('/wordpress-hosting', [\App\Http\Controllers\ServiceDisplayController::class, 'wordpressHosting'])->name('services.wordpress-hosting');
    Route::get('/reseller-hosting', [\App\Http\Controllers\ServiceDisplayController::class, 'resellerHosting'])->name('services.reseller-hosting');
    Route::get('/email-hosting', [\App\Http\Controllers\ServiceDisplayController::class, 'emailHosting'])->name('services.email-hosting');
    Route::get('/linux-vps', [\App\Http\Controllers\ServiceDisplayController::class, 'linuxVps'])->name('services.linux-vps');
    Route::get('/windows-vps', [\App\Http\Controllers\ServiceDisplayController::class, 'windowsVps'])->name('services.windows-vps');
    Route::get('/dedicated-server', [\App\Http\Controllers\ServiceDisplayController::class, 'dedicatedServer'])->name('services.dedicated-server');
    Route::get('/n8n-servers', [\App\Http\Controllers\ServiceDisplayController::class, 'n8nServers'])->name('services.n8n-servers');
    Route::get('/odoo-hosting', [\App\Http\Controllers\ServiceDisplayController::class, 'odooHosting'])->name('services.odoo-hosting');
    
    // Dynamic fallback for newly added categories
    Route::get('/{category_slug}', [\App\Http\Controllers\ServiceDisplayController::class, 'show'])->name('services.display');
});

Route::get('/otp', function () {
    return view('pages.otp');
})->name('otp');

Route::post('/otp', \App\Http\Controllers\Auth\VerifyOtpController::class)->name('otp.verify');


use App\Http\Controllers\Admin\CategoryManagementController;
use App\Http\Controllers\Admin\AdminManagementController;

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::resource('services', AdminServiceController::class)->names([
            'index'   => 'admin.services.index',
            'create'  => 'admin.services.create',
            'store'   => 'admin.services.store',
            'edit'    => 'admin.services.edit',
            'update'  => 'admin.services.update',
            'destroy' => 'admin.services.destroy',
        ]);

        Route::resource('categories', CategoryManagementController::class)->names([
            'index'   => 'admin.categories.index',
            'create'  => 'admin.categories.create',
            'store'   => 'admin.categories.store',
            'edit'    => 'admin.categories.edit',
            'update'  => 'admin.categories.update',
            'destroy' => 'admin.categories.destroy',
        ]);

        Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::post('/sync', [AdminSyncController::class, 'sync'])->name('admin.sync');

        // Super Admin only — manage admin accounts
        Route::middleware('super_admin')->group(function () {
            Route::get('/admins', [AdminManagementController::class, 'index'])->name('admin.admins.index');
            Route::get('/admins/create', [AdminManagementController::class, 'create'])->name('admin.admins.create');
            Route::post('/admins', [AdminManagementController::class, 'store'])->name('admin.admins.store');
            Route::get('/admins/{admin}/edit', [AdminManagementController::class, 'edit'])->name('admin.admins.edit');
            Route::put('/admins/{admin}', [AdminManagementController::class, 'update'])->name('admin.admins.update');
            Route::delete('/admins/{admin}', [AdminManagementController::class, 'destroy'])->name('admin.admins.destroy');
        });
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

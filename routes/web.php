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

use App\Http\Controllers\Back\AdminAuthController;
use App\Http\Controllers\Back\AdminServiceController;
use App\Http\Controllers\Back\AdminSyncController;
use App\Http\Controllers\Back\AdminUserController;
use App\Http\Controllers\Back\CategoryManagementController;
use App\Http\Controllers\Back\AdminManagementController;
use App\Http\Controllers\Front\ServiceDisplayController;

Route::get('/', function () {
    return view('front.home');
})->name('home');

// ─── Service Pages (Integrated) ───────────────────
Route::prefix('services')->group(function () {
    Route::get('/web-hosting', [ServiceDisplayController::class, 'webHosting'])->name('services.web-hosting');
    Route::get('/wordpress-hosting', [ServiceDisplayController::class, 'wordpressHosting'])->name('services.wordpress-hosting');
    Route::get('/reseller-hosting', [ServiceDisplayController::class, 'resellerHosting'])->name('services.reseller-hosting');
    Route::get('/email-hosting', [ServiceDisplayController::class, 'emailHosting'])->name('services.email-hosting');
    Route::get('/linux-vps', [ServiceDisplayController::class, 'linuxVps'])->name('services.linux-vps');
    Route::get('/windows-vps', [ServiceDisplayController::class, 'windowsVps'])->name('services.windows-vps');
    Route::get('/dedicated-server', [ServiceDisplayController::class, 'dedicatedServer'])->name('services.dedicated-server');
    Route::get('/n8n-servers', [ServiceDisplayController::class, 'n8nServers'])->name('services.n8n-servers');
    Route::get('/odoo-hosting', [ServiceDisplayController::class, 'odooHosting'])->name('services.odoo-hosting');
    
    // Dynamic fallback for newly added categories
    Route::get('/{category_slug}', [ServiceDisplayController::class, 'show'])->name('services.display');
});

Route::get('/otp', function () {
    return view('front.otp');
})->name('otp');

Route::post('/otp', \App\Http\Controllers\Auth\VerifyOtpController::class)->name('otp.verify');


// Back-end Routes
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('back.login');
    });
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('back.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('back.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('back.dashboard');
        })->name('back.dashboard');

        Route::resource('services', AdminServiceController::class)->names([
            'index'   => 'back.services.index',
            'create'  => 'back.services.create',
            'store'   => 'back.services.store',
            'edit'    => 'back.services.edit',
            'update'  => 'back.services.update',
            'destroy' => 'back.services.destroy',
        ]);

        Route::resource('categories', CategoryManagementController::class)->names([
            'index'   => 'back.categories.index',
            'create'  => 'back.categories.create',
            'store'   => 'back.categories.store',
            'edit'    => 'back.categories.edit',
            'update'  => 'back.categories.update',
            'destroy' => 'back.categories.destroy',
        ]);

        Route::get('/users', [AdminUserController::class, 'index'])->name('back.users.index');
        Route::post('/sync', [AdminSyncController::class, 'sync'])->name('back.sync');

        // Super Admin only — manage admin accounts
        Route::middleware('super_admin')->group(function () {
            Route::get('/admins', [AdminManagementController::class, 'index'])->name('back.admins.index');
            Route::get('/admins/create', [AdminManagementController::class, 'create'])->name('back.admins.create');
            Route::post('/admins', [AdminManagementController::class, 'store'])->name('back.admins.store');
            Route::get('/admins/{admin}/edit', [AdminManagementController::class, 'edit'])->name('back.admins.edit');
            Route::put('/admins/{admin}', [AdminManagementController::class, 'update'])->name('back.admins.update');
            Route::delete('/admins/{admin}', [AdminManagementController::class, 'destroy'])->name('back.admins.destroy');
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

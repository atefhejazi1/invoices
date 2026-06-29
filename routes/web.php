<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Customers_Report;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Invoices_Report;
use App\Http\Controllers\InvoicesArchiveController;
use App\Http\Controllers\InvoicesAttachmentsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localize', 'localizationRedirect', 'localeSessionRedirect', 'localeViewPath'],
], function () {

    Route::get('/', [LandingController::class, 'index'])->name('landing');

    Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::resource('invoices', InvoicesController::class);
        Route::resource('sections', SectionsController::class);
        Route::resource('products', ProductsController::class);
        Route::resource('invoicesAttachments', InvoicesAttachmentsController::class);
        Route::get('section/{id}',  [InvoicesController::class, 'getProducts']);
        Route::get('InvoicesDetails/{id}',  [InvoicesDetailsController::class, 'edit']);
        Route::get('Status_show/{id}',  [InvoicesController::class, 'show'])->name('Status_show');
        Route::post('Status_Update/{id}',  [InvoicesController::class, 'Status_Update'])->name('Status_Update');
        Route::get('Invoice_Paid',  [InvoicesController::class, 'Invoice_Paid']);
        Route::get('Invoice_UnPaid',  [InvoicesController::class, 'Invoice_UnPaid']);
        Route::get('Invoice_Partial',  [InvoicesController::class, 'Invoice_Partial']);
        Route::get('Print_invoice/{id}',  [InvoicesController::class, 'Print_invoice']);
        Route::get('export_invoices',  [InvoicesController::class, 'export']);

        Route::resource('Archive', InvoicesArchiveController::class);

        Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'get_file']);
        Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'open_file']);
        Route::delete('delete_file', [InvoicesDetailsController::class, 'destroy'])->name('delete_file');

        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);

        Route::get('invoices_report', [Invoices_Report::class, 'index']);
        Route::post('Search_invoices', [Invoices_Report::class, 'Search_invoices']);

        Route::get('customers_report', [Customers_Report::class, 'index'])->name('customers_report');
        Route::post('Search_customers', [Customers_Report::class, 'Search_customers']);

        Route::get('MarkAsRead_all', [InvoicesController::class, 'MarkAsRead_all'])->name('MarkAsRead_all');
        Route::get('unreadNotifications_count', [InvoicesController::class, 'unreadNotifications_count'])->name('unreadNotifications_count');
        Route::get('unreadNotifications', [InvoicesController::class, 'unreadNotifications'])->name('unreadNotifications');
    });

    Route::middleware(['permission:roles.view'])->group(function () {
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    });

    Route::middleware(['permission:roles.create'])->group(function () {
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    });

    Route::middleware(['permission:roles.edit'])->group(function () {
        Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    });

    Route::middleware(['permission:roles.delete'])->group(function () {
        Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });

    require __DIR__ . '/auth.php';

    Route::get('/{page}', [AdminController::class, 'index']);
});

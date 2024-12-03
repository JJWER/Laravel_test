<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;


// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
require __DIR__ . '/auth.php';

// Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Profile Management
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Employee Management
Route::middleware(['auth'])->group(function () {
    Route::resource('employees', EmployeeController::class);
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

});


// Reports Management
Route::middleware(['auth'])->group(function () {
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::post('reports/generate', [ReportController::class, 'generate'])->name('reports.generate');
});


// Settings Management
Route::middleware(['auth'])->group(function () {
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings/update', [SettingController::class, 'update'])->name('settings.update');
});


// Role and Permission Setup
Route::middleware(['auth'])->group(function () {
    Route::get('/setup-roles-permissions', [RolePermissionController::class, 'createRolesAndPermissions']);
    Route::get('/assign-role/{userId}/{roleName}', [RolePermissionController::class, 'assignRoleToUser']);
    Route::get('/check-permission/{userId}/{permission}', [RolePermissionController::class, 'checkUserPermission']);
});

// Role Management on Dashboard
Route::middleware(['auth'])->prefix('roles')->group(function () {
    Route::get('/', [RolePermissionController::class, 'index'])->name('roles.index');
    Route::get('/form/{role?}', [RolePermissionController::class, 'createOrEdit'])->name('roles.form');
    Route::post('/', [RolePermissionController::class, 'store'])->name('roles.store');
    Route::put('/{role}', [RolePermissionController::class, 'update'])->name('roles.update');
    Route::delete('/{role}', [RolePermissionController::class, 'destroy'])->name('roles.destroy');
});


// Reports funtion
Route::middleware(['auth'])->group(function () {
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::post('reports/generate', [ReportController::class, 'generate'])->name('reports.generate');
    //PDF Export
    Route::post('reports/export', [ReportController::class, 'export'])->name('reports.export');
    Route::post('/reports/download', [ReportController::class, 'downloadPDF'])->name('reports.download');

});

// Setting 
Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');


Route::get('/test-pdf', function () {
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('<h1>Test PDF</h1>');
    return $pdf->stream();
});

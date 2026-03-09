<?php

use App\Http\Controllers\FamilyController;
use App\Http\Controllers\FamilyMemberController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('family.index', [FamilyController::class, 'index'])->name('family.index');
    Route::get('/family/{id}/edit', [FamilyController::class, 'edit'])->name('family.edit');
    Route::put('family/{id}', [FamilyController::class, 'update'])->name('family.update');
    Route::get('family.create', [FamilyController::class, 'create'])->name('family.create');
    Route::post('family.create', [FamilyController::class, 'store'])->name('family.store');
    Route::delete('family/{id}', [FamilyController::class, 'destroy'])->name('family.delete');
    Route::get('family-member.index', [FamilyMemberController::class, 'index'])->name('family-member.index');

    Route::post('/upload-temp', [FileController::class, 'uploadTemp'])->name('upload.temp');
    Route::post('/delete-temp', [FileController::class, 'deleteTemp'])->name('delete.temp');

    Route::get('/get-rt-by-kelurahan/{kelurahanId}', [FamilyController::class, 'getRtByKelurahan'])->name('get.rt.by.kelurahan');
    Route::get('/families/export', [FamilyController::class, 'export'])->name('families.export');
    Route::get('/family-members/export', [FamilyMemberController::class, 'export'])->name('family-members.export');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
});

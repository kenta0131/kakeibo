<?php

use App\Http\Controllers\createController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\editController;
use Illuminate\Support\Facades\Route;

//画面の追加の際はrouteを付け足していく

Route::get('/', function () {
    return view('toppage');
});

Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
Route::post('/destroy{id}',[dashboardController::class, 'destroy'])->name('dashboard.destroy');
Route::get('/dashboard/edit/{id}', [editController::class, 'edit'])->name('dashboard.edit');
Route::put('/dashboard/update/{id}', [editController::class, 'update'])->name('dashboard.update');

Route::post('/create', [createController::class, 'create'])->name('create');
Route::get('/create',[createController::class, 'index']);

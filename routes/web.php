<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GardenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Tasks
// routes/web.php



Route::middleware(['auth'])->group(function () {
    Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::put('tasks/{task}/update-completion', [TaskController::class, 'updateCompletion'])->name('tasks.updateCompletion');
    Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

// Confirmation route for task completion
Route::get('tasks/{task}/confirm-completion', [TaskController::class, 'confirmCompletion'])->name('tasks.confirmCompletion');

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class)->except(['update']);
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::put('/tasks/{task}/update-completion', [TaskController::class, 'updateCompletion'])->name('tasks.updateCompletion');
});

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class)->except(['update']);
    Route::put('/tasks/{task}/update-completion', [TaskController::class, 'updateCompletion'])->name('tasks.updateCompletion');
});

// Garden

Route::middleware(['auth'])->group(function () {
    Route::get('/garden', [GardenController::class, 'index'])->name('garden.index');
    Route::post('/garden/{plant}/water', [GardenController::class, 'water'])->name('garden.water');
    Route::post('/garden/{plant}/memo', [GardenController::class, 'memo'])->name('garden.memo');
});
//Shop 
Route::middleware('auth')->group(function () {
    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::post('/shop/buy', [ShopController::class, 'buy'])->name('shop.buy');
});
// About and Fund routes
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/fund', function () {
    return view('fund');
})->name('fund');

require __DIR__.'/auth.php';

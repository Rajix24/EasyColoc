<?php

use App\Http\Controllers\ColocationController;
use App\Http\Controllers\ProfileController;
use App\Models\Colocation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    
    $colocations = Colocation::with('user')->get();
    return view('colocation.show',compact('colocations'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('colocations', ColocationController::class)->middleware(['auth', 'verified']);


require __DIR__.'/auth.php';

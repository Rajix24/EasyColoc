<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\ProfileController;
use App\Mail\Email;
use App\Models\Colocation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    $colocations = Colocation::all();
    return view('dashboard',compact('colocations'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('colocations', ColocationController::class)->middleware(['auth', 'verified']);
Route::resource('expence', DepenseController::class)->middleware(['auth' , 'verified']);
Route::resource('categories', CategoriesController::class)->middleware(['auth', 'verified']);

Route::get('/testEmail', function () {
    $name = 'younes rajix';
    Mail::to('rajix2100@gmail.com')->send(new Email($name));
});
require __DIR__.'/auth.php';

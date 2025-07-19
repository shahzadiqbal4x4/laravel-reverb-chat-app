<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    $message = rand(1, 10);
    MessageSent::dispatch($message);
    Log::info('Message dispatched', ['message' => $message]);
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

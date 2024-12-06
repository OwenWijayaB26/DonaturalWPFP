<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DListController;
use App\Http\Controllers\DonationController;

Route::redirect('/','login');

// Route::get('/listing',[DListController::class,'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/listing',[DListController::class,'index'])->middleware(['auth', 'verified'])->name('listing');



Route::get('/contactus', function () {
    return view('contactus');
})->middleware(['auth', 'verified'])->name('contactus');

Route::middleware('auth')->group(function () {
    Route::redirect('/','dashboard');
    Route::get('/about', function () {return view('about');})->name('about');
    Route::get('/listing/{dlists:slug}',[DListController::class,'show']);
    Route::post('/listing/{dlist:slug}/generate-token', [DonationController::class, 'generateToken']);
    Route::get('/dashboard',[DListController::class,'dboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/payment-successful',function(){
        return view('thanks');
    });
});

require __DIR__.'/auth.php';

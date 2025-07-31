<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;

Route::get('/', function () {
    return redirect()->route('calendar');
})->middleware(['auth', 'verified']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/update-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/delete-profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

     Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
        Route::post('/calendar/store', [CalendarController::class, 'store'])->name('calendar.store');
        Route::post('/calendar/update', [CalendarController::class, 'update'])->name('calendar.update');
        Route::post('/calendar/delete/{id}', [CalendarController::class, 'destroy'])->name('calendar.delete');
        Route::post('/calendar/drag-update', [CalendarController::class, 'dragUpdate'])->name('calendar.dragUpdate');
});

require __DIR__.'/auth.php';

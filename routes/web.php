<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;


Route::get('/', function () {
    return redirect()->route('calendar');
});


 Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
        Route::post('/calendar/store', [CalendarController::class, 'store'])->name('calendar.store');
        Route::post('/calendar/update', [CalendarController::class, 'update'])->name('calendar.update');
        Route::post('/calendar/delete/{id}', [CalendarController::class, 'destroy'])->name('calendar.delete');
        Route::post('/calendar/drag-update', [CalendarController::class, 'dragUpdate'])->name('calendar.dragUpdate');


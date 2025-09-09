<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\TransferForm;
use App\Livewire\TransactionList;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/transferencias',TransferForm::class)->name('transferencias');
Route::get('/transferencias/lista', TransactionList::class)->name('transferencias.lista');

Route::view('dashboard', 'dashboard')->name('dashboard');
// Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
// });

// require __DIR__.'/auth.php';

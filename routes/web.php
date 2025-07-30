<?php
// trigger redeploy
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {return view('welcome');});
Route::post('/commander', [CommandeController::class, 'store'])->name('commande.store');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


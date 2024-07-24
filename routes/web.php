<?php

use App\Http\Controllers\Guest\CharacterController as GuestCharacterController;
use App\Http\Controllers\Admin\CharacterController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::name('guest.')
->prefix('guest')
->group(function(){
    Route::resource('characters', GuestCharacterController::class)->only('index', 'show');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')
->name('admin.') // il prefisso che viene aggiunto a tutti i NOMI delle rotte nel gruppo
->prefix('admin') // il prefisso che viene aggiunto a tutti gli URL delle rotte nel gruppo
->group(function(){
    
    
    Route::resource('types', TypeController::class);

    //Route::get('/item', [ItemController::class, 'item'])->name('item');
    Route::resource('items', ItemController::class);
    
    Route::resource('characters', CharacterController::class);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

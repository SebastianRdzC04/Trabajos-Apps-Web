<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\PersonaController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', function () {return view('pages.home');})->name('home');

    Route::get('agregar-usuario', function () {return view('pages.agregarUsuario');})->name('addUser');

    Route::get('add-direccion', [DireccionController::class, 'create'])->name('addDireccion');

    Route::get('add-persona', [PersonaController::class, 'create'])->name('addPersona');

    Route::get('personas/{id}', [PersonaController::class, 'getPersona'])->name('getPersona');  

    Route::get('direcciones/{id}', [DireccionController::class, 'getDireccion'])->name('getDireccion');

    Route::post('add-persona', [PersonaController::class, 'store'])->name('storePersona');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::post('register', [RegisteredUserController::class, 'store'])->name('register');

    Route::post('add-direccion', [DireccionController::class, 'store'])->name('storeDireccion');

    Route::delete('delete-persona', [PersonaController::class, 'delete'])->name('deletePersona');

    Route::patch('update-persona', [PersonaController::class, 'update'])->name('updatePersona');

    Route::delete('delete-direccion', [DireccionController::class, 'delete'])->name('deleteDireccion');

    Route::patch('update-direccion', [DireccionController::class, 'update'])->name('updateDireccion');

    Route::patch('change-direccion-persona', [DireccionController::class, 'changePersona'])->name('changeDireccionPersona');


});

Route::middleware('guest')->group(function () {

    Route::get('login', function () {return view('pages.login');})->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');


});

Route::get('prueba', function () {return view('pages.prueba');})->name('prueba');


/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
*/

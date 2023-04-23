<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::middleware(['auth', 'is_admin'])->group(function() {

    Route::get('/admin', [AdminController::class, 'index'])->name('index');
    Route::get('/regNew', [RegisteredUserController::class, 'create'])->name('create');
    //Route::get('/register', [RegisteredUserController::class, 'create'])->name('create');

});
    
// Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function(){
        
//     Route::get('/admin', [AdminController::class, 'index'])->name('index');
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


/* Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Route::get('/admin', [AdminController::class, 'index'])->name('index');
    //Route::get('/admin', [AdminController::class, 'index']);
    Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function(){
        //Route::get('/', [AdminController::class, 'index']);
        //Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/', [AdminController::class, 'index'])->name('index');
    });
});
 */



require __DIR__.'/auth.php';

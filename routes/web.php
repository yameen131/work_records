<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\sectionController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\is_admin;
use GuzzleHttp\Promise\Create;

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

Route::group(['middleware' => ['auth','is_admin']], function() {

    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('', [RegisteredUserController::class, 'create'])->name('register.');
    Route::get('admin', [sectionController::class, 'index'])->name('section.index');
    

});
    

require __DIR__.'/auth.php';



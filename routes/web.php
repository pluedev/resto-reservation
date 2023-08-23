<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\MenusController;
use App\Http\Controllers\Admin\TablesController;
use App\Http\Controllers\Admin\ReservationsController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\MenuController;
use App\Http\Controllers\Frontend\ReservationController;
use App\Http\Controllers\Frontend\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
Route::get('/reservations/step-one', [ReservationController::class, 'stepOne'])->name('reservations.step-one');
Route::post('/reservations/store/step-one', [ReservationController::class, 'storeStepOne'])->name('reservations.store.step-one');
Route::get('/reservations/step-two', [ReservationController::class, 'stepTwo'])->name('reservations.step-two');
Route::post('/reservations/store/step-two', [ReservationController::class, 'storeStepTwo'])->name('reservations.store.step-two');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/menus', MenusController::class);
    Route::resource('/tables', TablesController::class);
    Route::resource('/reservations', ReservationsController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\Makanan;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/admin', [Controller::class, 'index'])->middleware('auth')->name('kategori.index');

// Route::get('/kategori/create', [Controller::class, 'create'])->name('kategori.create');
// Route::post('/kategori', [Controller::class, 'store'])->name('kategori.store');
// Route::put('/kategori/{id}/edit', [Controller::class, 'edit'])->name('kategori.edit');
// Route::delete('/kategori/{id}/delete', [Controller::class, 'destroy'])->name('kategori.destroy');

Route::post('/makanan', [Controller::class, 'storeMakanan'])->name('makanan.store');
Route::put('/makanan/{id}/edit', [Controller::class, 'editMakanan'])->name('makanan.edit');
Route::delete('/makanan/{id}/delete', [Controller::class, 'destroyMakanan'])->name('makanan.destroy');

Route::group(['middleware' => 'guest'], function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    route::post('/login', [AuthController::class, 'loginPost'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/forgotpassword', [AuthController::class, 'forgotpassword'])->name('passreset');
    Route::post('/forgotpassword', [AuthController::class, 'forgotpasswordPost'])->name('passreset');
});
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/', function () {
    return view('index');
});


Route::get('/menu', function () {
    return view('menu',[
        'makanan' => Makanan::where('id_kategori', 6)->get()
    ]);
});


Route::get('/menu/makanan', function () {
    return view('menu',[
        'makanan' => Makanan::where('id_kategori', 6)->get()
    ]);
});


Route::get('/menu/minuman', function () {
    return view('menu',[
        'makanan' => Makanan::where('id_kategori', 7)->get()
    ]);
});

//get the storage link
Route::get('/sym', function () {
    Artisan::call('storage:link');
});
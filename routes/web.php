<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\Makanan;
use App\Http\Controllers\AuthController;
use App\Models\Image;
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




Route::get('/login', function () {
    return view('login/login', [
        'logo' => Image::find(8)
    ]);
});

Route::get('/register', function () {
    return view('login/register', [
        'logo' => Image::find(8)
    ]);
});

Route::get('/forgotpassword', function () {
    return view('login/password', [
        'logo' => Image::find(8)
    ]);
});


Route::get('/', function () {
    return view('index', [
        'banner' => Image::find(6),
        'profil' => Image::find(7),
        'logo' => Image::find(8),
        'original' => Makanan::where('id', 10)->first(),
        'pangsit' => Makanan::where('id', 11)->first()
    ]);
});


Route::get('/menu', function () {
    return view('menu',[
        'makanan' => Makanan::where('id_kategori', 6)->get(),
        'logo' => Image::find(8),
        'wa' => Image::find(12)
    ]);
});


Route::get('/menu/makanan', function () {
    return view('menu',[
        'makanan' => Makanan::where('id_kategori', 6)->get(),
        'logo' => Image::find(8),
        'wa' => Image::find(12)
    ]);
});


Route::get('/menu/minuman', function () {
    return view('menu',[
        'makanan' => Makanan::where('id_kategori', 7)->get(),
        'logo' => Image::find(8),
        'wa' => Image::find(9)
    ]);
});

//get the storage link
Route::get('/sym', function () {
    Artisan::call('storage:link');
});
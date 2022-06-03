<?php

use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\UserController;
use App\Models\Pelatihan;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>['guest']], function(){
    Route::get('login', [UserController::class, 'indexLogin'])->name('login');
    Route::post('login', [UserController::class, 'login']);
});

Route::group(['middleware'=>['auth']], function(){
    Route::get('dash', [UserController::class, 'indexDash']);
    Route::get('logout', [UserController::class, 'logout']);

    Route::resource('pelatihan', PelatihanController::class);
    Route::post('pelatihan/store', [PelatihanController::class, 'store']);
    Route::post('pelatihan/edit', [PelatihanController::class, 'edit']);
    Route::get('pelatihan/view/{id}', [PelatihanController::class, 'indexpeserta']);
    Route::get('pelatihan/destroy/{id}', [PelatihanController::class, 'destroy']);

    Route::get('status/terima/{id}', [PelatihanController::class, 'terima']);
    Route::get('status/tolak/{id}', [PelatihanController::class, 'tolak']);

    Route::get('infobayar', [PengaturanController::class, 'index']);
});


Route::get('/', function () {
    $pelatihans = Pelatihan::all()->where('visible', 1);
    return view('welcome', ['pelatihans' => $pelatihans]);
});

Route::post('daftar/store', [PendaftarController::class, 'store']);
Route::get('daftar/{id}', [PelatihanController::class, 'daftar']);

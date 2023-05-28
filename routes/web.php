<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::delete('/deleteUser/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('user.delete');

Route::get('/pemasukan', [App\Http\Controllers\PemasukanController::class, 'index'])->name('pemasukan');
Route::post('/data', [App\Http\Controllers\PemasukanController::class, 'store'])->name('data.store');
Route::get('/edit/{id}', [App\Http\Controllers\PemasukanController::class, 'edit'])->name('pemasukan.edit');
Route::post('/update/{id}', [App\Http\Controllers\PemasukanController::class, 'update'])->name('pemasukan.update');
Route::delete('/delete/{id}', [App\Http\Controllers\PemasukanController::class, 'delete'])->name('pemasukan.delete');

Route::get('/pengeluaran', [App\Http\Controllers\PengeluaranController::class, 'index'])->name('pengeluaran');
Route::post('/dataPeng', [App\Http\Controllers\PengeluaranController::class, 'store'])->name('dataPeng.store');
Route::get('/editPeng/{id}', [App\Http\Controllers\PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
Route::post('/updatePeng/{id}', [App\Http\Controllers\PengeluaranController::class, 'update'])->name('pengeluaran.update');
Route::delete('/deletePeng/{id}', [App\Http\Controllers\PengeluaranController::class, 'delete'])->name('pengeluaran.delete');

Route::get('/listPerjalanan', [App\Http\Controllers\ListPerjalananController::class, 'index'])->name('listPerjalanan');
Route::post('/dataPer', [App\Http\Controllers\ListPerjalananController::class, 'store'])->name('dataPer.store');
Route::delete('/deletePer/{id}', [App\Http\Controllers\ListPerjalananController::class, 'delete'])->name('listPerjalanan.delete');
<?php

use App\Events\PrivateTest;
use Illuminate\Support\Facades\Route;
use App\Events\Sendhai;
use App\Http\Controllers\BarangController;
use App\Models\User;

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

Route::get('broadcast', function () {
   broadcast(new Sendhai());
   return 'Event Sukses Send';
});

Route::get('broadcastPrivate', function () {
    $user = User::find(1); 
    broadcast(new PrivateTest($user));
    return 'Event Private daun sukses';
 });

 Route::get('/daftarbarang', [BarangController::class, 'index']); 
 Route::get('/formbarang', [BarangController::class, 'create']); 
 Route::post('/formbarang', [BarangController::class, 'store'])->name('store.barang');


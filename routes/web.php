<?php

use App\Http\Controllers\AturanController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\TestStatus\Risky;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::resource('penyakit', PenyakitController::class);
    Route::resource('gejala', GejalaController::class);
    // Route::get('/get-gejala/{penyakit_id}', [DiagnosaController::class, 'getGejala'])->name('get.gejala');
    Route::get('/get-gejala/{penyakit_id}', [DiagnosaController::class, 'getGejalaByPenyakit']);
    Route::resource('aturan', AturanController::class);
    // Route::post('/diagnosa/proses', [DiagnosaController::class, 'prosesDiagnosa'])->name('diagnosa.proses');
    Route::resource('diagnosa', DiagnosaController::class);
    // Route::get('/riwayat',[RiwayatController::class])->name('index');
    

    // Rute Logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('home');
    })->name('logout');
});

Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('diagnosis_history.index');
});

require __DIR__.'/auth.php';

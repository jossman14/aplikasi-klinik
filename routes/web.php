<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\JenisKelaminController;
use App\Http\Controllers\GolonganDarahController;
use App\Http\Controllers\SapaanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\SDMController;
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

Route::get('/', [DashController::class, "index"]);

Route::resource('pasien', PasienController::class);
Route::post('/cariKota', [PasienController::class, "cariKota"])->name('cariKota');

Route::post('/cariDesa', [PasienController::class, "cariDesa"])->name('cariDesa');
Route::post('/cariKecamatan', [PasienController::class, "cariKecamatan"])->name('cariKecamatan');
Route::post('/cariProvinsi', [PasienController::class, "cariProvinsi"])->name('cariProvinsi');
Route::resource('dash', DashController::class);
Route::resource('agama', AgamaController::class);
Route::resource('jenis_kelamin', JenisKelaminController::class);
Route::resource('golongan_darah', GolonganDarahController::class);
Route::resource('sapaan', SapaanController::class);
Route::resource('jabatan', JabatanController::class);
Route::resource('sdm', SDMController::class);


Route::post('/pasienFilter', [PasienController::class, "indexFilter"])->name('pasienFilter');
Route::post('/agamaFilter', [AgamaController::class, "agamaFilter"])->name('agamaFilter');
Route::post('/jenisKelaminFilter', [jenisKelaminController::class, "jenisKelaminFilter"])->name('jenisKelaminFilter');
Route::post('/golonganDarahFilter', [GolonganDarahController::class, "golonganDarahFilter"])->name('golonganDarahFilter');
Route::post('/sapaanFilter', [SapaanController::class, "sapaanFilter"])->name('sapaanFilter');
Route::post('/jabatanFilter', [JabatanController::class, "jabatanFilter"])->name('jabatanFilter');
Route::post('/SDMFilter', [SDMController::class, "SDMFilter"])->name('SDMFilter');

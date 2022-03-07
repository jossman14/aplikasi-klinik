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
use App\Http\Controllers\JenisObatController;
use App\Http\Controllers\JenisTindakanController;
use App\Http\Controllers\JenisTransaksiController;
use App\Http\Controllers\PenyediaObatController;
use App\Http\Controllers\SatuanObatController;
use App\Http\Controllers\PengeluaranBerulangController;
use App\Http\Controllers\ObatDetailController;
use App\Http\Controllers\PoliklinikController;
use App\Http\Controllers\StatusNikahController;
use App\Http\Controllers\DaftarPeriksaController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\SoapPerawatController;
use App\Http\Controllers\SoapDokterController;
use App\Http\Controllers\TransaksiController;
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
Route::post('/cariNik', [PasienController::class, "cariNik"])->name('cariNik');
Route::post('/searchDiagnosa', [PasienController::class, "searchDiagnosa"])->name('searchDiagnosa');
Route::post('/searchTindakan', [PasienController::class, "searchTindakan"])->name('searchTindakan');
Route::post('/searchObat', [PasienController::class, "searchObat"])->name('searchObat');


Route::resource('dash', DashController::class);
Route::resource('agama', AgamaController::class);
Route::resource('jenis_kelamin', JenisKelaminController::class);
Route::resource('golongan_darah', GolonganDarahController::class);
Route::resource('sapaan', SapaanController::class);
Route::resource('jabatan', JabatanController::class);
Route::resource('sdm', SDMController::class);
Route::resource('jenis_obat', JenisObatController::class);
Route::resource('jenis_tindakan', JenisTindakanController::class);
Route::resource('jenis_transaksi', JenisTransaksiController::class);
Route::resource('penyedia_obat', PenyediaObatController::class);
Route::resource('pengeluaran_berulang', PengeluaranBerulangController::class);
Route::resource('satuan_obat', SatuanObatController::class);
Route::resource('obat_detail', ObatDetailController::class);
Route::resource('poliklinik', PoliklinikController::class);
Route::resource('status_nikah', StatusNikahController::class);
Route::resource('daftar_periksa', DaftarPeriksaController::class);
Route::resource('tindakan', TindakanController::class);
Route::resource('soap_perawat', SoapPerawatController::class);
Route::resource('soap_dokter', SoapDokterController::class);
Route::resource('transaksi', TransaksiController::class);

Route::get('daftar_periksa/daftar_periksa_baru/{pasien}', [DaftarPeriksaController::class, 'daftar'])->name("daftarPeriksa");
Route::get('soap_perawat/soap_perawat_baru/{id}/{id1}', [SoapPerawatController::class, 'createSoapPerawat'])->name("createSoapPerawat");
Route::get('soap_perawat/soap_perawat_pasien/{id}', [SoapPerawatController::class, 'showSoapPerawat'])->name("showSoapPerawat");
Route::get('soap_dokter/soap_dokter_baru/{id}/{id1}', [SoapDokterController::class, 'createSoapDokter'])->name("createSoapDokter");
Route::get('soap_dokter/soap_dokter_pasien/{id}', [SoapDokterController::class, 'showSoapDokter'])->name("showSoapDokter");


Route::post('/pasienFilter', [PasienController::class, "indexFilter"])->name('pasienFilter');
Route::post('/agamaFilter', [AgamaController::class, "agamaFilter"])->name('agamaFilter');
Route::post('/jenisKelaminFilter', [jenisKelaminController::class, "jenisKelaminFilter"])->name('jenisKelaminFilter');
Route::post('/golonganDarahFilter', [GolonganDarahController::class, "golonganDarahFilter"])->name('golonganDarahFilter');
Route::post('/sapaanFilter', [SapaanController::class, "sapaanFilter"])->name('sapaanFilter');
Route::post('/jabatanFilter', [JabatanController::class, "jabatanFilter"])->name('jabatanFilter');
Route::post('/sdmFilter', [SDMController::class, "sdmFilter"])->name('sdmFilter');
Route::post('/jenisObatFilter', [JenisObatController::class, "jenisObatFilter"])->name('jenisObatFilter');
Route::post('/jenisTindakanFilter', [JenisTindakanController::class, "jenisTindakanFilter"])->name('jenisTindakanFilter');
Route::post('/jenisTransaksiFilter', [JenisTransaksiController::class, "jenisTransaksiFilter"])->name('jenisTransaksiFilter');
Route::post('/penyediaObatFilter', [PenyediaObatController::class, "penyediaObatFilter"])->name('penyediaObatFilter');
Route::post('/pengeluaranBerulangFilter', [PengeluaranBerulangController::class, "pengeluaranBerulangFilter"])->name('pengeluaranBerulangFilter');
Route::post('/satuanObatFilter', [SatuanObatController::class, "satuanObatFilter"])->name('satuanObatFilter');
Route::post('/obatDetailFilter', [ObatDetailController::class, "obatDetailFilter"])->name('obatDetailFilter');
Route::post('/poliklinikFilter', [PoliklinikController::class, "poliklinikFilter"])->name('poliklinikFilter');
Route::post('/statusNikahFilter', [StatusNikahController::class, "statusNikahFilter"])->name('statusNikahFilter');
Route::post('/daftarPeriksaFilter', [DaftarPeriksaController::class, "daftarPeriksaFilter"])->name('daftarPeriksaFilter');
Route::post('/tindakanFilter', [TindakanController::class, "tindakanFilter"])->name('tindakanFilter');
Route::post('/transaksiFilter', [TransaksiController::class, "transaksiFilter"])->name('transaksiFilter');

Route::get('halaman_daftar_periksa/utama', [DaftarPeriksaController::class, 'indexDaftarPeriksa'])->name("indexDaftarPeriksa");
Route::get('halaman_daftar_periksa/show/{id}', [DaftarPeriksaController::class, 'showDaftarPeriksa'])->name("showDaftarPeriksa");

Auth::routes();

Route::get('/home', [DashController::class, 'index'])->name('home');

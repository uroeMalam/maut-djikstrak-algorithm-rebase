<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubkriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\LahanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Artisan;

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

// Create Storage Link For CPanel
// after upload to Cpanel Remember to RUN This route before you launch the web
Route::get('/foo', function () {
    Artisan::call('storage:link');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    // Artisan::call('migrate:fresh --seed');
    return redirect()->route('dashboard_index');
});



// route login
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('layout.dashboard');
    // });

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // route kriteria
    Route::get('/kriteria',[KriteriaController::class, 'index'])->name('kriteria-index');
    Route::get('/kriteria/tambah',[KriteriaController::class, 'create'])->name('kriteria-create'); 
    Route::post('/kriteria/simpan',[KriteriaController::class, 'store'])->name('kriteria-simpan');
    Route::get('/kriteria/edit/{id}',[KriteriaController::class, 'edit'])->name('kriteria-edit');
    Route::post('/kriteria/update',[KriteriaController::class, 'update'])->name('kriteria-update');
    Route::delete('/kriteria/delete',[KriteriaController::class, 'destroy'])->name('kriteria-delete');
    Route::get('/kriteria/data-table', [KriteriaController::class, 'DataTable'])->name('kriteria_dataTable');
    
    // route sub kriteria
    Route::get('/subkriteria',[SubkriteriaController::class, 'index'])->name('subkriteria-index');
    Route::get('/subkriteria/tambah',[SubkriteriaController::class, 'create'])->name('subkriteria-create'); 
    Route::post('/subkriteria/simpan',[SubkriteriaController::class, 'store'])->name('subkriteria-simpan');
    Route::get('/subkriteria/edit/{id}',[SubkriteriaController::class, 'edit'])->name('subkriteria-edit');
    Route::post('/subkriteria/update',[SubkriteriaController::class, 'update'])->name('subkriteria-update');
    Route::delete('/subkriteria/delete',[SubkriteriaController::class, 'destroy'])->name('subkriteria-delete');
    Route::get('/subkriteria/data-table', [SubkriteriaController::class, 'DataTable'])->name('subkriteria_dataTable');

     // route kecamatan
     Route::get('/kecamatan',[KecamatanController::class, 'index'])->name('kecamatan-index');
     Route::get('/kecamatan/tambah',[KecamatanController::class, 'create'])->name('kecamatan-create'); 
     Route::post('/kecamatan/simpan',[KecamatanController::class, 'store'])->name('kecamatan-simpan');
     Route::get('/kecamatan/edit/{id}',[KecamatanController::class, 'edit'])->name('kecamatan-edit');
     Route::post('/kecamatan/update',[KecamatanController::class, 'update'])->name('kecamatan-update');
     Route::delete('/kecamatan/delete',[KecamatanController::class, 'destroy'])->name('kecamatan-delete');
     Route::get('/kecamatan/data-table', [KecamatanController::class, 'DataTable'])->name('kecamatan_dataTable');
    
     // route lahan
     Route::get('/lahan',[LahanController::class, 'index'])->name('lahan-index');
     Route::get('/lahan/tambah',[LahanController::class, 'create'])->name('lahan-create'); 
     Route::post('/lahan/simpan',[LahanController::class, 'store'])->name('lahan-simpan');
     Route::get('/lahan/edit/{id}',[LahanController::class, 'edit'])->name('lahan-edit');
     Route::post('/lahan/update',[LahanController::class, 'update'])->name('lahan-update');
     Route::delete('/lahan/delete',[LahanController::class, 'destroy'])->name('lahan-delete');
     Route::get('/lahan/data-table', [LahanController::class, 'DataTable'])->name('lahan_dataTable');
    
     // route alternatif
     Route::get('/alternatif',[AlternatifController::class, 'index'])->name('alternatif-index');
     Route::get('/alternatif/tambah',[AlternatifController::class, 'create'])->name('alternatif-create'); 
     Route::post('/alternatif/simpan',[AlternatifController::class, 'store'])->name('alternatif-simpan');
     Route::get('/alternatif/edit/{id}',[AlternatifController::class, 'edit'])->name('alternatif-edit');
     Route::post('/alternatif/update',[AlternatifController::class, 'update'])->name('alternatif-update');
     Route::delete('/alternatif/delete',[AlternatifController::class, 'destroy'])->name('alternatif-delete');
     Route::get('/alternatif/data-table', [AlternatifController::class, 'DataTable'])->name('alternatif_dataTable');
    
     // route penilaian
     Route::get('/penilaian',[PenilaianController::class, 'index'])->name('penilaian-index');
     Route::get('/penilaian/tambah',[PenilaianController::class, 'create'])->name('penilaian-create'); 
     Route::post('/penilaian/simpan',[PenilaianController::class, 'store'])->name('penilaian-simpan');
     Route::get('/penilaian/edit/{id}',[PenilaianController::class, 'edit'])->name('penilaian-edit');
     Route::post('/penilaian/update',[PenilaianController::class, 'update'])->name('penilaian-update');
     Route::delete('/penilaian/delete',[PenilaianController::class, 'destroy'])->name('penilaian-delete');
     Route::get('/penilaian/data-table', [PenilaianController::class, 'DataTable'])->name('penilaian_dataTable');
     
     // route hasil
     Route::get('/hasil',[HasilController::class, 'index'])->name('hasil-index');
     Route::post('/hasil/maxmin', [HasilController::class, 'maxmin'])->name('maxmin_dataTable');
     Route::post('/hasil/raw', [HasilController::class, 'raw'])->name('raw_dataTable');
     Route::post('/hasil/normalisasi', [HasilController::class, 'normalisasi'])->name('normalisasi_dataTable');
     Route::post('/hasil/matriks', [HasilController::class, 'matriks'])->name('matriks_dataTable');
     Route::post('/hasil/hasil', [HasilController::class, 'hasil'])->name('hasil_dataTable');
     
});
    //  route map MAUT
    Route::get('/maut/index/map',[MapController::class, 'MapMautIndex'])->name('map-maut-index');
   //  Route::post('/maut/map', [HasilController::class, 'mapMaut'])->name('hasil_dataTable');
    Route::get('/maut/getByData/{tahun}', [HasilController::class, 'mapMaut'])->name('maut_getByData');
   
    
    
    // route hasil
    Route::get('/map',[MapController::class, 'index'])->name('map-index');

// user pages
Route::get('/maut',[MapController::class, 'MapMautUser'])->name('map-maut-user');
Route::get('/djikstrak',[MapController::class, 'MapDjikstrakUser'])->name('map-djikstrak-user');
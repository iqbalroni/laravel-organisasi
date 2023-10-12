<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\OrganisasiController;

Route::get('/',[HomeController::class,'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
Route::get('/siswa/detail/{id}', [SiswaController::class ,'detail']);
Route::get('/siswa/edit/{id}', [SiswaController::class ,'edit']);
Route::post('/siswa/update/{id}',[SiswaController::class , 'update']);
Route::get('/siswa/add', [SiswaController::class ,'add']);
Route::post('/siswa/insert',[SiswaController::class ,'insert']);
Route::get('/siswa/hapus/{id}',[SiswaController::class,'hapus']);
Route::get('/siswa/print',[SiswaController::class,'print']);
Route::get('/siswa/import',[SiswaController::class,'importsiswa']);
Route::post('/siswa/saveimport',[SiswaController::class,'saveimport']);

Route::post('/logo/{id}',[HomeController::class,'editlogo']);

Auth::routes(['register'=>false]);

Route::group(['middleware' => 'admin'],function(){

    Route::get('/jurusan',[JurusanController::class, 'index'])->name('jurusan');
    Route::get('/jurusan/add',[JurusanController::class, 'tambah']);
    Route::get('/jurusan/hapus/{id}',[JurusanController::class, 'hapus']);
    Route::get('/jurusan/detail/{id}',[JurusanController::class, 'detail']);
    Route::get('/jurusan/print/{id}',[JurusanController::class, 'print']);
    Route::get('/jurusan/edit/{id}',[JurusanController::class, 'edit']);
    Route::post('/jurusan/saveedit/{id}',[JurusanController::class, 'saveedit']);
    Route::post('/jurusan/simpan',[JurusanController::class,'simpan']);

    Route::get('/admin', [SiswaController::class, 'indexadmin'])->name('admin');
    Route::get('/siswa/hapusadmin/{id}',[SiswaController::class,'hapusadmin']);

    Route::get('/organisasi',[OrganisasiController::class,'index'])->name('organisasi');
    Route::get('/tabeladmin',[OrganisasiController::class,'tabeladmin']);
    Route::get('/organisasi/add',[OrganisasiController::class,'insert'])->name('addorg');
    Route::post('/organisasi/simpan',[OrganisasiController::class,'save']);
    Route::get('/organisasi/hapus/{id}',[OrganisasiController::class,'hapus']);
    Route::get('/organisasi/edit/{id}',[OrganisasiController::class,'edit']);
    Route::get('/organisasi/detail/{id}',[OrganisasiController::class,'detail']);
    Route::get('/organisasi/print/{id}',[OrganisasiController::class,'print']);
    Route::post('/organisasi/simpanedit/{id}',[OrganisasiController::class,'saveedit']);
});
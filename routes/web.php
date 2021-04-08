<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\AuthController;

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

Route::group(['middleware' => 'auth:masyarakat'], function() {
	Route::get('/masyarakat', [MasyarakatController::class, 'index'])->name('home');
	Route::get('/masyarakat/pengaduan', [MasyarakatController::class, 'create']);
	Route::get('/masyarakat/pengaduan/{id}', [MasyarakatController::class, 'detailPengaduan']);
	Route::post('/masyarakat/pengaduan', [MasyarakatController::class, 'store']);
	Route::get('/masyarakat/profile', [MasyarakatController::class, 'show']);
	Route::get('/masyarakat/edit', [MasyarakatController::class, 'edit']);
	Route::patch('/masyarakat/edit', [MasyarakatController::class, 'update']);
});

Route::group(['middleware' => 'auth:petugas'], function() {

	Route::group(['middleware' => 'checkLevel:admin'], function() {

		Route::get('/admin', [AdminController::class, 'index']);

		// Profile
		Route::get('/admin/profile', [AdminController::class, 'profile']);
		Route::get('/admin/profile/edit', [AdminController::class, 'editProfile']);
		Route::patch('/admin/profile/edit', [AdminController::class, 'updateProfile']);

		// Petugas
		Route::get('/admin/data/petugas', [AdminController::class, 'dataPetugas']);
		Route::get('/admin/register', [AdminController::class, 'viewRegister']);
		Route::post('/admin/register', [AdminController::class, 'register']);
		Route::delete('/admin/data/petugas/{id}', [AdminController::class, 'deletePetugas']);

		// Masyarakat
		Route::get('/admin/data/masyarakat', [AdminController::class, 'dataMasyarakat']);
		Route::delete('/admin/data/masyarakat/{nik}', [AdminController::class, 'deleteMasyarakat']);

		// Pengaduan
		Route::get('/admin/data/pengaduan', [AdminController::class, 'dataPengaduan']);
		Route::get('/admin/data/pengaduan/{pengaduan}', [AdminController::class, 'detailPengaduan']);
		Route::delete('/admin/data/pengaduan/{id}', [AdminController::class, 'deletePengaduan']);
		
		// Tanggapan
		Route::get('/admin/data/tanggapan', [TanggapanController::class, 'index']);
		Route::get('/admin/data/tanggapan/saya', [TanggapanController::class, 'tanggapanSaya']);
		Route::get('/admin/data/tanggapan/{tanggapan}', [TanggapanController::class, 'show']);
		Route::get('/admin/data/tanggapan/saya/{id}', [TanggapanController::class, 'detailTanggapanSaya']);
		Route::post('/admin/tanggapan/{id}', [TanggapanController::class, 'update']);

		// Generate Laporan
		Route::get('/admin/cetak/data/pengaduan', [AdminController::class, 'viewCetakData']);
		Route::get('/admin/export/excel', [AdminController::class, 'exportExcel']);
		Route::post('/admin/export/pdf', [AdminController::class, 'exportPdf']);

	});

	Route::group(['middleware' => 'checkLevel:petugas'], function() {
		Route::get('/petugas', [PetugasController::class, 'index']);

		// Profile
		Route::get('/petugas/profile', [PetugasController::class, 'profile']);
		Route::get('/petugas/profile/edit', [PetugasController::class, 'editProfile']);
		Route::patch('/petugas/profile/edit', [PetugasController::class, 'updateProfile']);

		// Masyarakat
		Route::get('/petugas/data/masyarakat', [PetugasController::class, 'dataMasyarakat']);

		// Pengaduan
		Route::get('/petugas/data/pengaduan', [PetugasController::class, 'dataPengaduan']);
		Route::get('/petugas/data/pengaduan/{pengaduan}', [PetugasController::class, 'detailPengaduan']);

		// Tanggapan
		Route::get('/petugas/data/tanggapan/saya', [TanggapanController::class, 'tanggapanSaya']);
		Route::get('/petugas/data/tanggapan/saya/{id}', [TanggapanController::class, 'detailTanggapanSaya']);
		Route::post('/petugas/tanggapan/{id}', [TanggapanController::class, 'update']);
	});

});

// Logout
	Route::group(['middleware' => 'auth:masyarakat,petugas'], function() {
		Route::post('/logout', [AuthController::class, 'logout']);
	});

// Registrasi
	Route::get('/register', [AuthController::class, 'viewRegister']);
	Route::post('/register', [AuthController::class, 'register']);

// Login
	Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
	Route::post('/login', [AuthController::class, 'login']);

Route::get('/', [AuthController::class, 'index']);
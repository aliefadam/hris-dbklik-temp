<?php

use App\Http\Controllers\HeadController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\ResignController;
use App\Http\Controllers\RulesHRDController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(["guest"])->group(function () {
    Route::get("/login", [UserController::class, "showLogin"])->name("showLogin");
    Route::post("/login", [UserController::class, "login"])->name("login");
});

Route::middleware(["auth"])->group(function () {
    Route::prefix('/owner')->group(function () {
        Route::get('/', [OwnerController::class, 'welcome'])->middleware("role:1");
        Route::get('/daftar-pengajuan', [OwnerController::class, 'daftarPengajuan'])->middleware("role:1");
        Route::get('/daftar-karyawan', [OwnerController::class, 'daftarKaryawan'])->middleware("role:1");
        Route::get('/data-karyawan/{karyawan}', [OwnerController::class, 'dataKaryawan'])->middleware("role:1");
        Route::get('/struktur-pegawai', [OwnerController::class, 'strukturPegawai'])->middleware("role:1");
        Route::get('/notification', [OwnerController::class, 'notification'])->middleware("role:1");
        Route::get('/profile', [OwnerController::class, 'profile'])->middleware("role:1");
        Route::get('/ganti-password', [OwnerController::class, 'gantiPassword'])->middleware("role:1");
        Route::put('/ganti-password', [OwnerController::class, 'simpanPasswordBaru'])->middleware("role:1");
        Route::post('/tampil-jumlah-izin/', [PerizinanController::class, 'tampilJumlahIzin'])->middleware("role:1");
    });

    Route::prefix("/head")->group(function () {
        Route::get("/", [HeadController::class, 'welcome'])->middleware("role:2");
        Route::get("/form-perizinan", [HeadController::class, 'formPerizinan'])->middleware("role:2");
        Route::get("/riwayat", [HeadController::class, 'riwayat'])->middleware("role:2");
        Route::get("/struktur-pegawai", [HeadController::class, 'strukturPegawai'])->middleware("role:2");
        Route::get("/daftar-pengajuan", [HeadController::class, 'daftarPengajuan'])->middleware("role:2");
        Route::get("/daftar-karyawan", [HeadController::class, 'daftarKaryawan'])->middleware("role:2");
        Route::get("/data-karyawan/{id}", [HeadController::class, 'dataKaryawan'])->middleware("role:2");
        Route::get("/notification", [HeadController::class, 'notification'])->middleware("role:2");
        Route::get("/notification/{notifikasi}", [HeadController::class, 'notificationSelected'])->middleware("role:2");
        Route::get("/profile", [HeadController::class, 'profile'])->middleware("role:2");
        Route::get("/ganti-password", [HeadController::class, 'gantiPassword'])->middleware("role:2");
        Route::put('/ganti-password', [HeadController::class, 'simpanPasswordBaru'])->middleware("role:2");
    });

    Route::prefix('/hr')->group(function () {
        Route::get('/', [HRController::class, 'welcome'])->middleware("role:3");
        Route::get('/form-perizinan', [HRController::class, 'formPerizinan'])->middleware("role:3");
        Route::get('/riwayat', [HRController::class, 'riwayat'])->middleware("role:3");
        Route::get('/struktur-pegawai', [HRController::class, 'strukturPegawai'])->middleware("role:3");
        Route::get('/daftar-pengajuan', [HRController::class, 'daftarPengajuan'])->middleware("role:3");
        Route::get('/daftar-karyawan', [HRController::class, 'daftarKaryawan'])->middleware("role:3");
        Route::get('/data-karyawan/{karyawan}', [HRController::class, 'dataKaryawan'])->middleware("role:3");
        Route::get('/biodata/{karyawan}', [HRController::class, 'biodata'])->middleware("role:3");
        Route::get('/notification', [HRController::class, 'notification'])->middleware("role:3");
        Route::get("/notification/{notifikasi}", [HRController::class, 'notificationSelected'])->middleware("role:3");
        Route::get('/profile', [HRController::class, 'profile'])->middleware("role:3");
        Route::get('/ganti-password', [HRController::class, 'gantiPassword'])->middleware("role:3");
        Route::post('/resign', [ResignController::class, 'resign'])->middleware("role:3");
        Route::post('/updateCatatan', [HRController::class, 'updateCatatan'])->middleware("role:3");
        Route::post('/updateKontrak', [HRController::class, 'updateKontrak'])->middleware("role:3");
        Route::post('/tambah-aturan', [RulesHRDController::class, 'tambahAturan'])->middleware("role:3");
        Route::post('/edit-aturan/{aturan}', [RulesHRDController::class, 'editAturan'])->middleware("role:3");
        Route::post('/hapus-aturan/{aturan}', [RulesHRDController::class, 'hapusAturan'])->middleware("role:3");
    });

    Route::get("/", [StaffController::class, "index"])->middleware("role:4");
    Route::get('/form-perizinan', [StaffController::class, 'formPerizinan'])->middleware("role:4");
    Route::get('/riwayat', [StaffController::class, 'riwayat'])->middleware("role:4");
    Route::get('/struktur-pegawai', [StaffController::class, 'strukturPegawai'])->middleware("role:4");
    Route::get('/ganti-password', [StaffController::class, 'gantiPassword'])->middleware("role:4");
    Route::put('/ganti-password', [StaffController::class, 'simpanPasswordBaru'])->middleware("role:4");
    Route::get('/notification', [StaffController::class, 'notification'])->middleware("role:4");
    Route::get("/notification/{notifikasi}", [StaffController::class, 'notificationSelected'])->middleware("role:4");
    Route::get('/profile', [StaffController::class, 'profile'])->middleware("role:4");

    Route::post("/ajukan-perizinan", [PerizinanController::class, "ajukanPerizinan"]);
    Route::post("/balas-perizinan/{perizinan}", [PerizinanController::class, "balasPerizinan"]);
    Route::post("/kirim-email", [PerizinanController::class, "kirimEmail"]);

    Route::put("/baca-notif", [NotifikasiController::class, "bacaNotif"]);
});

Route::get("/logout", [UserController::class, "logout"]);

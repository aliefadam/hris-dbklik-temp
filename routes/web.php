<?php

use App\Http\Controllers\HeadController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PemesananKateringController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\ResignController;
use App\Http\Controllers\RulesHRDController;
use App\Http\Controllers\ShiftController;
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
        Route::get("/notification/{notifikasi}", [OwnerController::class, 'notificationSelected'])->middleware("role:1");
        Route::get('/profile', [OwnerController::class, 'profile'])->middleware("role:1");
        Route::get('/ganti-password', [OwnerController::class, 'gantiPassword'])->middleware("role:1");
        Route::put('/ganti-password', [OwnerController::class, 'simpanPasswordBaru'])->middleware("role:1");
        Route::post('/tampil-jumlah-izin', [PerizinanController::class, 'tampilJumlahIzin'])->middleware("role:1");
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
        Route::get('/katering', [HeadController::class, 'katering'])->middleware("role:2");
        Route::get('/pengisian-kpi', [HeadController::class, 'pengisianKPI'])->middleware("role:2");
        Route::post('/isi-kpi', [HeadController::class, 'simpanKPI'])->middleware("role:2");
        Route::get('/data-rekapan', [HeadController::class, 'dataRekapan'])->middleware("role:2");
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
        Route::put('/ganti-password', [HRController::class, 'simpanPasswordBaru'])->middleware("role:3");
        Route::post('/resign', [ResignController::class, 'resign'])->middleware("role:3");
        Route::post('/updateCatatan', [HRController::class, 'updateCatatan'])->middleware("role:3");
        Route::post('/updateKontrak', [HRController::class, 'updateKontrak'])->middleware("role:3");
        Route::post('/tambah-aturan', [RulesHRDController::class, 'tambahAturan'])->middleware("role:3");
        Route::post('/edit-aturan/{aturan}', [RulesHRDController::class, 'editAturan'])->middleware("role:3");
        Route::post('/hapus-aturan/{aturan}', [RulesHRDController::class, 'hapusAturan'])->middleware("role:3");
        Route::post('/mutasi', [HRController::class, 'mutasi'])->middleware("role:3");
        Route::post('/kontrak', [HRController::class, 'kontrak'])->middleware("role:3");
        Route::post('/tambahMutasi', [HRController::class, 'tambahMutasi'])->middleware("role:3");
        Route::post('/edit-profile-karyawan/{karyawan}', [HRController::class, 'editProfileKaryawan'])->middleware("role:3");
        Route::get('/export-excel/{s}/{e}', [HRController::class, 'exportExcel'])->middleware("role:3");
        Route::get('/export-excel-katering/{s}/{e}', [HRController::class, 'exportExcelKatering'])->middleware("role:3");
        Route::get('/katering', [HRController::class, 'katering'])->middleware("role:3");
        Route::get('/edit-katering', [HRController::class, 'editKatering'])->middleware("role:3");
        Route::put('/ubah-katering', [HRController::class, 'ubahKatering'])->middleware("role:3");
        Route::get('/aktifkan-katering/{tanggal_jam}', [HRController::class, 'aktifkanKatering'])->middleware("role:3");
        Route::get('/nonaktifkan-katering', [HRController::class, 'nonaktifkanKatering'])->middleware("role:3");
        Route::get('/daftar-pesanan-katering', [HRController::class, 'daftarPesananKatering'])->middleware("role:3");
        Route::post('/lembur', [LemburController::class, 'lembur'])->middleware("role:3");
        Route::get('/jadwal', [HRController::class, 'viewJadwal'])->middleware("role:3");
        Route::post('/tambahJam', [JamController::class, 'tambahJam'])->middleware("role:3");
        Route::post('/editJam/{jam}', [JamController::class, 'editJam'])->middleware("role:3");
        Route::delete('/hapusJam/{jam}', [JamController::class, 'hapusJam'])->middleware("role:3");
        Route::post('/tambahJadwal', [JadwalController::class, 'tambahJadwal'])->middleware("role:3");
        Route::post('/editJadwal/{Jadwal}', [JadwalController::class, 'editJadwal'])->middleware("role:3");
        Route::delete('/hapusJadwal/{Jadwal}', [JadwalController::class, 'hapusJadwal'])->middleware("role:3");
        Route::post('/tambahShift', [ShiftController::class, 'tambahShift'])->middleware("role:3");
        Route::post('/editShift/{Shift}', [ShiftController::class, 'editShift'])->middleware("role:3");
        Route::delete('/hapusShift/{Shift}', [ShiftController::class, 'hapusShift'])->middleware("role:3");
        Route::post('/tambahJadwal', [JadwalController::class, 'tambahJadwal'])->middleware("role:3");
        Route::post('/editJadwal/{Jadwal}', [JadwalController::class, 'editJadwal'])->middleware("role:3");
        Route::delete('/hapusJadwal/{Jadwal}', [JadwalController::class, 'hapusJadwal'])->middleware("role:3");
        Route::get("/kpi", [HRController::class, "kpi"])->middleware("role:3");
        Route::get("/export-excel-kpi/{bulan}/{tahun}", [HRController::class, "exportKPI"])->middleware("role:3");
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
    Route::get('/katering', [StaffController::class, 'katering'])->middleware("role:4");
    Route::get('/data-rekapan', [StaffController::class, 'dataRekapan'])->middleware("role:4");

    Route::post('/pesan-katering', [PemesananKateringController::class, 'pesanKatering']);
    Route::post('/edit-foto', [StaffController::class, 'editFoto']);
    Route::post("/ajukan-perizinan", [PerizinanController::class, "ajukanPerizinan"]);
    Route::post("/balas-perizinan/{perizinan}", [PerizinanController::class, "balasPerizinan"]);
    Route::post("/kirim-email", [PerizinanController::class, "kirimEmail"]);

    Route::put("/baca-notif", [NotifikasiController::class, "bacaNotif"]);
});

Route::get("/logout", [UserController::class, "logout"]);

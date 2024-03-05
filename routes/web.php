<?php

use App\Models\DaftarPengajuan;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome', [
        "title" => "Beranda",
    ]);
});

Route::get('/form-perizinan', function () {
    return view('perizinan', [
        "title" => "Perizinan",
    ]);
});

Route::get('/riwayat', function () {
    return view('riwayat', [
        "data_pengajuan" => DaftarPengajuan::getAll(),
        "title" => "Riwayat",
    ]);
});

Route::get("/ganti-password", function () {
    return view("ganti_password", [
        "title" => "Ganti Password  ",
    ]);
});

Route::get("/notification", function () {
    return view("notification", [
        "title" => "Notifikasi",
    ]);
});

Route::get("/profile", function () {
    return view("profile", [
        "title" => "Profil",
    ]);
});

Route::prefix("/hr")->group(function () {
    Route::get("/", function () {
        return view('hr.welcome', [
            "title" => "Beranda",
        ]);
    });
    Route::get("/form-perizinan", function () {
        return view('hr.perizinan', [
            "title" => "Perizinan",
        ]);
    });
    Route::get("/riwayat", function () {
        return view('hr.riwayat', [
            "data_pengajuan" => DaftarPengajuan::getAll(),
            "title" => "Riwayat",
        ]);
    });
    Route::get("/daftar-pengajuan", function () {
        return view('hr.daftar-pengajuan', [
            "data_pengajuan" => DaftarPengajuan::getAll(),
            "title" => "Daftar Pengajuan",
        ]);
    });
    Route::get("/daftar-karyawan", function () {
        return view('hr.daftar-karyawan', [
            "data_karyawan" => Karyawan::getKaryawan(),
            "title" => "Daftar Karyawan",
        ]);
    });
    Route::get("/data-karyawan/{id}", function ($id) {
        return view('hr.karyawan-detail', [
            "data_karyawan" => Karyawan::getKaryawanById($id),
            "data_karyawan_t" => Karyawan::getKaryawan(),
            "title" => "Detail Karyawan",
        ]);
    });

    Route::get("/notification", function () {
        return view("hr.notification", [
            "title" => "Notifikasi",
        ]);
    });

    Route::get("/profile", function () {
        return view('hr.profile', [
            "title" => "Profil",
        ]);
    });

    Route::get("/ganti-password", function () {
        return view('hr.ganti_password', [
            "title" => "Ganti Password",
        ]);
    });
});

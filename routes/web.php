<?php

use App\Http\Controllers\UserController;
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

Route::get('/struktur-pegawai/loop', function () {

    $data_brief = 
    [
        [
            "position" => "Directur",
            "name" => "Denny",
            "level" => 1,
            "divisi" => null,
            "sub_divisi" => null
        ],
        [
            "position" => "Manager IT",
            "name" => "Alif",
            "level" => 2,
            "divisi" => "IT",
            "sub_divisi" => null
        ],
        [
            "position" => "Head IT",
            "name" => "Fionaldy ",
            "level" => 3,
            "sub_divisi" => "IT",
            "divisi" => "IT"
        ],
        [
            "position" => "Head IT Support",
            "name" => "Alif",
            "level" => 3,
            "sub_divisi" => "IT Support",
            "divisi" => "IT"
        ],
        [
            "position" => "Staff IT Support",
            "name" => "Fionaldy A. ",
            "level" => 4,
            "sub_divisi" => "IT Support",
            "divisi" => "IT"
        ],
        [
            "position" => "Staff IT",
            "name" => "Okta",
            "level" => 4,
            "sub_divisi" => "IT",
            "divisi" => "IT"
        ],
        [
            "position" => "Staff IT",
            "name" => "Via",
            "level" => 4,
            "sub_divisi" => "IT",
            "divisi" => "IT"
        ],
        [
            "position" => "Staff IT",
            "name" => "Nat",
            "level" => 4,
            "sub_divisi" => "IT",
            "divisi" => "IT"
        ]
    ];

    $data_brief_upper = 
    [
        
        [
            "position" => "Direktur",
            "name" => "Denny",
            "level" => 1
        ]
        
    ];

    return view('struktur_pegawai', [
        "data_pengajuan" => DaftarPengajuan::getAll(),
        "title" => "Struktur Pegawai",
        "actualEmployee" => "Fionaldy A. Manik",
        "data_brief" => $data_brief,
        "data_brief_upper" => $data_brief_upper
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

    Route::get('/struktur-pegawai', function () {
        return view('hr.struktur_pegawai', [
            "data_pengajuan" => DaftarPengajuan::getAll(),
            "title" => "Struktur Pegawai",
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


Route::prefix("/head")->group(function () {
    Route::get("/", function () {
        return view('head.welcome', [
            "title" => "Beranda",
        ]);
    });
    Route::get("/form-perizinan", function () {
        return view('head.perizinan', [
            "title" => "Perizinan",
        ]);
    });
    Route::get("/riwayat", function () {
        return view('head.riwayat', [
            "data_pengajuan" => DaftarPengajuan::getAll(),
            "title" => "Riwayat",
        ]);
    });
    Route::get('/struktur-pegawai', function () {
        return view('head.struktur_pegawai', [
            "data_pengajuan" => DaftarPengajuan::getAll(),
            "title" => "Struktur Pegawai",
        ]);
    });
    Route::get("/daftar-pengajuan", function () {
        return view('head.daftar-pengajuan', [
            "data_pengajuan" => DaftarPengajuan::getAll(),
            "title" => "Daftar Pengajuan",
        ]);
    });
    Route::get("/daftar-karyawan", function () {
        return view('head.daftar-karyawan', [
            "data_karyawan" => Karyawan::getKaryawan(),
            "title" => "Daftar Karyawan",
        ]);
    });
    Route::get("/data-karyawan/{id}", function ($id) {
        return view('head.karyawan-detail', [
            "data_karyawan" => Karyawan::getKaryawanById($id),
            "data_karyawan_t" => Karyawan::getKaryawan(),
            "title" => "Detail Karyawan",
        ]);
    });

    Route::get("/notification", function () {
        return view("head.notification", [
            "title" => "Notifikasi",
        ]);
    });

    Route::get("/profile", function () {
        return view('head.profile', [
            "title" => "Profil",
        ]);
    });

    Route::get("/ganti-password", function () {
        return view('head.ganti_password', [
            "title" => "Ganti Password",
        ]);
    });
});

Route::prefix("/owner")->group(function () {
    Route::get("/", function () {
        return view('owner.welcome', [
            "title" => "Beranda",
        ]);
    });
    Route::get("/daftar-pengajuan", function () {
        return view('owner.daftar-pengajuan', [
            "data_pengajuan" => DaftarPengajuan::getAll(),
            "title" => "Daftar Pengajuan",
        ]);
    });
    Route::get("/daftar-karyawan", function () {
        return view('owner.daftar-karyawan', [
            "data_karyawan" => Karyawan::getKaryawan(),
            "title" => "Daftar Karyawan",
        ]);
    });
    Route::get("/data-karyawan/{id}", function ($id) {
        return view('owner.karyawan-detail', [
            "data_karyawan" => Karyawan::getKaryawanById($id),
            "data_karyawan_t" => Karyawan::getKaryawan(),
            "title" => "Detail Karyawan",
        ]);
    });
    Route::get('/struktur-pegawai', function () {
        return view('owner.struktur_pegawai', [
            "data_pengajuan" => DaftarPengajuan::getAll(),
            "title" => "Struktur Pegawai",
        ]);
    });
    Route::get("/notification", function () {
        return view("owner.notification", [
            "title" => "Notifikasi",
        ]);
    });
    Route::get("/profile", function () {
        return view('owner.profile', [
            "title" => "Profil",
        ]);
    });
    Route::get("/ganti-password", function () {
        return view('owner.ganti_password', [
            "title" => "Ganti Password",
        ]);
    });
});


Route::get("/login", [UserController::class, "showLogin"])->name("showLogin");
Route::post("/login", [UserController::class, "login"])->name("login");

<?php

namespace App\Http\Controllers;

use App\Models\DaftarPengajuan;
use App\Models\Karyawan;
use App\Models\Perizinan;
use Illuminate\Http\Request;

class HeadController extends Controller
{
    public function welcome()
    {
        return view('head.welcome', [
            "title" => "Beranda",
            "dataDiri" => [
                "nama" => auth()->user()->karyawan->nama_lengkap,
                "divisi" => auth()->user()->karyawan->subDivisi->divisi->nama_divisi,
                "sub_divisi" => auth()->user()->karyawan->subDivisi->nama_sub_divisi,
                "jabatan" => auth()->user()->karyawan->jabatan->nama_jabatan,
                "cabang" => auth()->user()->karyawan->cabang->nama_cabang,
            ],
        ]);
    }

    public function formPerizinan()
    {
        return view('head.perizinan', ["title" => "Perizinan"]);
    }

    public function riwayat()
    {
        return view('head.riwayat', [
            "data_pengajuan" => DaftarPengajuan::getAll(),
            "title" => "Riwayat",
        ]);
    }

    public function strukturPegawai()
    {
        return view('head.struktur_pegawai', [
            "data_pengajuan" => DaftarPengajuan::getAll(),
            "title" => "Struktur Pegawai",
        ]);
    }

    public function daftarPengajuan()
    {
        return view('head.daftar-pengajuan', [
            "data_perizinan" => Perizinan::all(),
            "title" => "Daftar Pengajuan",
        ]);
    }

    public function notification()
    {
        return view('head.notification', ["title" => "Notifikasi"]);
    }

    public function profile()
    {
        return view('head.profile', [
            "title" => "Profil",
            "dataDiri" => [
                "nama" => auth()->user()->karyawan->nama_lengkap,
                "email" => auth()->user()->karyawan->email,
                "no_telephone" => auth()->user()->karyawan->no_telephone,
                "no_whatsapp" => auth()->user()->karyawan->no_whatsapp,
                "alamat" => auth()->user()->karyawan->alamat_domisili,
                "tanggal_mulai_kontrak" => auth()->user()->karyawan->tanggal_masuk_kerja,
                "tanggal_akhir_kontrak" => auth()->user()->karyawan->berakhir_kerja,
                "no_rekening" => auth()->user()->karyawan->no_rekening_bca,
                "divisi" => auth()->user()->karyawan->subDivisi->divisi->nama_divisi,
                "sub_divisi" => auth()->user()->karyawan->subDivisi->nama_sub_divisi,
                "jabatan" => auth()->user()->karyawan->jabatan->nama_jabatan,
                "cabang" => auth()->user()->karyawan->cabang->nama_cabang,
            ],
        ]);
    }

    public function gantiPassword()
    {
        return view('head.ganti_password', ["title" => "Ganti Password"]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DaftarPengajuan;
use App\Models\Izin;
use App\Models\Perizinan;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        return view('welcome', [
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
        return view('perizinan', [
            "title" => "Perizinan",
            "jenis_izin" => Izin::all(),
        ]);
    }

    public function riwayat()
    {
        return view('riwayat', [
            "riwayat" => Perizinan::where("karyawan_id", auth()->user()->karyawan->id)->get(),
            "title" => "Riwayat",
        ]);
    }

    public function strukturPegawai()
    {
        return view('struktur_pegawai', [
            "data_pengajuan" => DaftarPengajuan::getAll(),
            "title" => "Struktur Pegawai",
        ]);
    }

    public function gantiPassword()
    {
        return view("ganti_password", [
            "title" => "Ganti Password",
        ]);
    }

    public function notification()
    {
        return view("notification", [
            "title" => "Notifikasi",
        ]);
    }

    public function profile()
    {
        return view("profile", [
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
}

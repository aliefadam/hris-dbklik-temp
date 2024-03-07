<?php

namespace App\Http\Controllers;

use App\Models\DaftarPengajuan;
use App\Models\Karyawan;
use App\Models\Perizinan;
use Illuminate\Http\Request;

class HRController extends Controller
{
    public function welcome()
    {
        return view('hr.welcome', [
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
        return view('hr.perizinan', ["title" => "Perizinan"]);
    }

    public function riwayat()
    {
        return view('hr.riwayat', [
            "riwayat" => Perizinan::where("karyawan_id", auth()->user()->karyawan->id)->get(),
            "title" => "Riwayat",
        ]);
    }

    public function strukturPegawai()
    {
        return view('hr.struktur_pegawai', [
            "data_pengajuan" => DaftarPengajuan::getAll(),
            "title" => "Struktur Pegawai",
        ]);
    }

    public function daftarPengajuan()
    {
        return view('hr.daftar-pengajuan', [
            "data_perizinan" => Perizinan::all(),
            "title" => "Daftar Pengajuan",
        ]);
    }

    public function daftarKaryawan()
    {
        return view('hr.daftar-karyawan', [
            "data_karyawan" => Karyawan::all(),
            "title" => "Daftar Karyawan",
        ]);
    }

    public function dataKaryawan(Karyawan $karyawan)
    {
        return view('hr.karyawan-detail', [
            "data_karyawan" => $karyawan,
            "title" => "Detail Karyawan",
        ]);
    }

    public function notification()
    {
        return view('hr.notification', ["title" => "Notifikasi"]);
    }

    public function profile()
    {
        return view('hr.profile', [
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
        return view('hr.ganti_password', ["title" => "Ganti Password"]);
    }
}

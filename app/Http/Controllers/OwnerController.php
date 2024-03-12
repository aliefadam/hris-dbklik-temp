<?php

namespace App\Http\Controllers;

use App\Models\DaftarPengajuan;
use App\Models\Karyawan;
use App\Models\Perizinan;
use App\Models\User;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function welcome()
    {
        return view('owner.welcome', ["title" => "Beranda"]);
    }

    public function daftarPengajuan(Request $request)
    {
        if ($request->s == "") {
            $dataPerizinan = Perizinan::orderBy("updated_at", "DESC")->get();
        } else {
            $mulai = $request->s;
            $akhir = $request->e;
            $dataPerizinan = Perizinan::whereBetween("tanggal_mulai", [$mulai, $akhir])
                ->orderBy("updated_at", "DESC")
                ->get();
        }

        return view('owner.daftar-pengajuan', [
            "data_perizinan" => $dataPerizinan,
            "title" => "Daftar Pengajuan",
            "mulai" => isset($mulai) ? $mulai : null,
            "akhir" => isset($akhir) ? $akhir : null,
        ]);
    }

    public function daftarKaryawan()
    {
        return view('owner.daftar-karyawan', [
            "data_karyawan" => Karyawan::all(),
            "title" => "Daftar Karyawan",
        ]);
    }

    public function dataKaryawan(Karyawan $karyawan)
    {
        return view('owner.karyawan-detail', [
            "data_karyawan" => $karyawan,
            "title" => "Detail Karyawan",
        ]);
    }

    public function strukturPegawai()
    {
        return view('owner.struktur_pegawai', [
            "data_pegawai" => Karyawan::orderBy("jabatan_id", "ASC")->get(),
            "jabatan_id" => auth()->user()->karyawan->jabatan_id,
            "diatas_satu_level" => auth()->user()->karyawan->jabatan_id - 1,
            "title" => "Struktur Pegawai",
        ]);
    }

    public function notification()
    {
        return view('owner.notification', ["title" => "Notifikasi"]);
    }

    public function profile()
    {
        return view('owner.profile', [
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
        return view('owner.ganti_password', [
            "title" => "Ganti Password",
        ]);
    }

    public function simpanPasswordBaru(Request $request)
    {
        $kataSandiLama = $request->kata_sandi_lama;
        $kataSandiBaru = $request->kata_sandi_baru;
        $konfirmasiKataSandiBaru = $request->konfirmasi_kata_sandi_baru;

        if (password_verify($kataSandiLama, auth()->user()->password)) {
            if ($kataSandiBaru == $konfirmasiKataSandiBaru) {
                $user = User::find(auth()->user()->id);
                $user->update([
                    "password" => $kataSandiBaru,
                ]);
                return redirect()->back()->with("pesan", [
                    "jenis" => "berhasil",
                    "body" => "Berhasil Mengganti Kata Sandi",
                ]);
            } else {
                return redirect()->back()->with("pesan", [
                    "jenis" => "gagal",
                    "body" => "Konfirmasi Kata Sandi Tidak Cocok",
                ]);
            }
        } else {
            return redirect()->back()->with("pesan", [
                "jenis" => "gagal",
                "body" => "Kata Sandi Lama Tidak Cocok",
            ]);
        }
    }
}

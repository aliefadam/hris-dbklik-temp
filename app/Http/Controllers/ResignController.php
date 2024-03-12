<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Resign;
use App\Models\Karyawan;

class ResignController extends Controller
{
<<<<<<< HEAD
    public function resign(Request $request)
    {
        $karyawan_id = $request->input('karyawan_id');
        $namaFile = $request->file_surat;
        if ($request->hasFile("file_surat")) {
            $namaFile = auth()->user()->id;
            $namaFile .= "_" . date("Y-m-d_H-i-s");
            $extension = $request->file("file_surat")->extension();
            $namaFile = "$namaFile.$extension";
            File::move($request->file("file_surat")->path(), public_path("upload/file_surat/$namaFile"));
        }

        Resign::create([
            'karyawan_id' => $karyawan_id,
            'tanggal_resign' => $request->tanggal_resign,
            'catatan' => $request->catatan,
            "surat_resign_file" => $namaFile,
        ]);
        
        $karyawan=Karyawan::find($karyawan_id);
        $karyawan->update([
            "status_karyawan" => "Resign"
        ]);

        return redirect()->back();
    }
=======
>>>>>>> 38ee78253b3684f6bb79dcb8e1fb1721915326a9
}

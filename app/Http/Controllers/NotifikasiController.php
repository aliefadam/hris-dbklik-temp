<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function bacaNotif(Request $request)
    {
        $notifikasi = Notifikasi::find($request->id);
        $notifikasi->status_dibaca = true;
        $notifikasi->save();

        $idPengaju = json_decode($notifikasi->pesan, true);
        $idPengaju = $idPengaju["id_pengaju"];
        $punyaSendiri = $idPengaju == auth()->user()->id ? true : false;

        return response()->json(json_encode([
            'punyaSendiri' => $punyaSendiri,
            'notifikasi' => $notifikasi
        ]));

        // return response()->json($idPengaju);
    }
}

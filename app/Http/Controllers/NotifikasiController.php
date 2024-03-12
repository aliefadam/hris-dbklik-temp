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

        return response()->json($notifikasi);
    }
}

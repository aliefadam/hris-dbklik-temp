<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    public $selectedNotifikasi = 0;

    public function setSelectedNotifikasi($id)
    {
        $this->selectedNotifikasi = $id;
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}

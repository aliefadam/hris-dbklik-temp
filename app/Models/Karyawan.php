<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function subDivisi()
    {
        return $this->belongsTo(SubDivisi::class);
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }
}

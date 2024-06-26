<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    
    protected $guarded = ["id"];
    
    use HasFactory;
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}

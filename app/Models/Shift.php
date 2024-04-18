<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    
    public function jamMulai()
    {
        return $this->belongsTo(Jam::class, 'jam_mulai_id');
    }

    public function jamAkhir()
    {
        return $this->belongsTo(Jam::class, 'jam_akhir_id');
    }
}

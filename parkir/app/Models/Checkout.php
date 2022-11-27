<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
        'noPolisi',
        'idPegawai',
        'tglMasuk',
        'tglKeluar',
        'biaya',
        'jenisKendaraan'
    ];

    public function pegawai(){
        return $this->belongsTo(Pegawai::class,'id','idPegawai');
    }
}

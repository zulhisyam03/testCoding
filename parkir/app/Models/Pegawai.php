<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Checkout;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama',
        'tglLahir',
        'jabatan'
    ];

    public function user(){
        return $this->belongsTo(User::class,'idPegawai','id'); //key User, key Pegawai
    }

    public function checkout(){
        return $this->hasMany(Checkout::class,'id','idPegawai'); //Key Pegawai, keyCheckout
    }
}

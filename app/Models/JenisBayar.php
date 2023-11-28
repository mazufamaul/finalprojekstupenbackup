<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class JenisBayar extends Model
{
    use HasFactory;
    //mapping table 
    protected $table = 'jenis_bayar';
    //mapping kolom atau field
    protected $fillable = ['jenis'];
    public $timestamps = false;
    //relasi antara table

    
    public function tbl_mobil()
    {
        return $this->belongsTo(tbl_mobil::class);
    }

    public function JenisBayar(){
        return $this->hasMany(Pesanan::class,'jenis_bayar');
    }
}

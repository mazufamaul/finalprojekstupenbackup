<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_mobil extends Model
{
    use HasFactory;
    protected $table = 'tbl_mobil';
    protected $fillable = ['nama','warna','harga','no_polisi','jumlah_kursi','tahun_beli','gambar','id_merk'];
    public $timestamps = false;


    public function merk()
    {
        return $this->belongsTo(tbl_merk::class, 'id_merk');
    }

    public function mobil(){
        return $this->hasMany(Pesanan::class);
    }
}

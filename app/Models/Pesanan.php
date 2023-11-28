<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
   
    use HasFactory;
    protected $table = 'pesanan';
    protected $fillable = ['harga','tgl_pinjam','tgl_kembali','pemesan_id','jenis_bayar_id','mobil_id','perjalanan_id'];
    public $timestamps = false;



    public function pemesan()
    {
        return $this->belongsTo(Pemesan::class, 'pemesan_id');
    }

    public function perjalanan()
    {
        return $this->belongsTo(Perjalanan::class, 'perjalanan_id');
    }

    public function mobil()
    {
        return $this->belongsTo(tbl_mobil::class, 'mobil_id');
    }

    public function JenisBayar(){
        return $this->belongsTo(JenisBayar::class,'jenis_bayar_id');
    }

}

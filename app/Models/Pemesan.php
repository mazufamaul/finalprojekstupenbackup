<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesan extends Model
{

    use HasFactory;
    protected $table = 'pemesan';
    protected $fillable = ['nama','no_telepon','alamat','ktp','mobil','tanggal_pinjam','tanggal_kembali'];
    public $timestamps = false;

    public function pemesan(){
        return $this->hasMany(Pesanan::class,'pemesan_id');
    }
}

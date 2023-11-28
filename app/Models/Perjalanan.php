<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    use HasFactory;
    protected $table = 'perjalanan';
    protected $fillable = ['asal', 'tujuan', 'jarak'];
    public $timestamps = false;

    public function perjalanan(){
        return $this->hasMany(Pesanan::class);
    }
}

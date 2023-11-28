<?php

namespace App\Models;

use App\Models\Mobil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tbl_merk extends Model
{
    // use HasFactory;

    // function mobils()
    // {
    //     return $this->hasMany(Mobil::class);
    // }


    use HasFactory;
    //mapping table 
    protected $table = 'tbl_merk';
    //mapping kolom atau field
    protected $fillable = ['merk'];
    public $timestamps = false;
    //relasi antara table

    public function mobil(){
        return $this->hasMany(tbl_mobil::class);
    }

   

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_mobil;

class BerandaController extends Controller
{
    //
    public function index(){
        $mobil = tbl_mobil::join('tbl_merk','id_merk', '=', 'tbl_merk.id')
        ->select('tbl_mobil.*', 'tbl_merk.merk as jenis')
        ->get();
        
        return view('beranda.beranda', compact('mobil'));
        // return view ('admin.interface.index', compact('mobil'));
    }

    public function car(){
        $mobil = tbl_mobil::join('tbl_merk','id_merk', '=', 'tbl_merk.id')
        ->select('tbl_mobil.*', 'tbl_merk.merk as jenis')
        ->get();
        
        return view('beranda.car', compact('mobil'));
    }


    public function about(){
        
        return view('beranda.about');
    }

    public function contact(){
        
        return view('beranda.contact');
    }
}

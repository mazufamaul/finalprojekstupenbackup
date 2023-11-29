<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_mobil;
use Illuminate\Support\Facades\DB;

class InterfaceController extends Controller
{
    //
    public function index()
    {
        // $cars = Mobil::with('merk')->get();
        // $cars1 = DB::table('mobils', 'm')
        //     ->join('merks as mr', 'mr.id', '=', 'm.merk_id')
        //     ->select('m.*', 'mr.merk as merk')
        //     ->get();
        // return $cars;
        $mobil = tbl_mobil::join('tbl_merk','id_merk', '=', 'tbl_merk.id')
        ->select('tbl_mobil.*', 'tbl_merk.merk as jenis')
        ->get();
        return view ('admin.interface.index', compact('mobil'));



    }

    public function list()
    {
        //
        $mobil = tbl_mobil::join('tbl_merk','id_merk', '=', 'tbl_merk.id')
        ->select('tbl_mobil.*', 'tbl_merk.merk as jenis')
        ->get();
        return view ('admin.interface.listing', compact('mobil'));
    }


    public function blog(){

        return view ('admin.interface.blog');

    }

    public function about(){

        return view ('admin.interface.about');
        
    }

    public function contact(){

        return view ('admin.interface.contact');
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_mobil;
use App\Models\Pemesan;
use App\Models\Pesanan;
use App\Models\Perjalanan;
use AuthenticatesUsers;

class DashboardController extends Controller
{
    //fungsi index 
    // public function index(){
    //     return view('admin.dashboard'); //mengarahkan ke file dashboard yang ada didalam admin
    // }

    public function index(){
        $tbl_mobil = tbl_mobil::count();
        $pemesan = Pemesan::count();
        $pesanan = Pesanan::count();
        $perjalanan = Perjalanan::count();
        
        return view('admin.dashboard', compact('tbl_mobil', 'pemesan','pesanan','perjalanan')); //mengarahkan ke file dashboard yang ada didalam admin
    }


    
}

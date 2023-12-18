<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\tbl_mobil;
use App\Models\tbl_merk;
use App\Http\Resources\MobilResource;
use Illuminate\Support\Facades\Validator;

class MobilController extends Controller
{
    //
    public function index(){
    $mobil = tbl_mobil::join('tbl_merk','id_merk', '=', 'tbl_merk.id')
    ->select('tbl_mobil.*', 'tbl_merk.merk as jenis')
    ->get();
    return new MobilResource(true, 'Data Mobil', $mobil);
    }

    public function show($id){
        $mobil = tbl_mobil::join('tbl_merk','id_merk', '=', 'tbl_merk.id')
        ->select('tbl_mobil.*', 'tbl_merk.merk as jenis')
        ->where('tbl_mobil.id', $id)
        ->get();
        return new MobilResource(true, 'Detail Mobil', $mobil);
    }

    public function store(Request $request){
        // $request->validate([
            $validator = Validator::make($request->all(),[
            'nama' => 'required|max:30',
            'warna' => 'required|max:20',
            'harga' => 'required|max:11',
            'no_polisi' => 'required|max:10',
            'jumlah_kursi' => 'required|max:1',
            'tahun_beli' => 'required|max:4',
            'id_merk' => 'required|exists:tbl_merk,id',
            ]);
            if ($validator->fails()){
                return response()->json($validator->errors(),442);
            }
            DB::table('tbl_mobil')->insert([
                'nama'=>$request->nama,
                'warna'=>$request->warna,
                'harga'=>$request->harga,
                'no_polisi'=>$request->no_polisi,
                'jumlah_kursi'=>$request->jumlah_kursi,
                'tahun_beli'=>$request->tahun_beli,
                'gambar'=>$request->foto,
                'id_merk'=>$request->id_merk,
            ]);
            return new MobilResource(true, 'Data Mobil Berhasil ditambahkan', 'mobil');
    }


    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'nama' => 'required|max:30',
            'warna' => 'required|max:20',
            'harga' => 'required|max:11',
            'no_polisi' => 'required|max:10',
            'jumlah_kursi' => 'required|max:1',
            'tahun_beli' => 'required|max:4',
            'id_merk' => 'required|exists:tbl_merk,id',
            ]);

            if ($validator->fails()){
                return response()->json($validator->errors(),442);
            }
            $mobil = tbl_mobil::whereId($id)->update([
                'nama'=>$request->nama,
                'warna'=>$request->warna,
                'harga'=>$request->harga,
                'no_polisi'=>$request->no_polisi,
                'jumlah_kursi'=>$request->jumlah_kursi,
                'tahun_beli'=>$request->tahun_beli,
                'gambar'=>$request->foto,
                'id_merk'=>$request->id_merk,
            ]);
            
            return new MobilResource(true, 'Data Mobil Berhasil diubah', $mobil);
    }


    public function destroy($id){
        $mobil = tbl_mobil::whereId($id)->first();
        $mobil->delete();
        return new MobilResource(true, 'Data Berhasil Dihapus', $mobil);
    }
}

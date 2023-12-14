<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class PesananController extends Controller
{
    //
    public function generatePDF($orderId)
    {
        // $order = Pesanan::find($orderId); // Ganti YourOrderModel dengan model Eloquent yang sesuai
        // $pdf = PDF::loadView('admin.pesanan.receipt', ['order' => $order]);
        // return $pdf->download('receipt.pdf');

        $order = Pesanan::find($orderId); // Ganti YourOrderModel dengan model Eloquent yang sesuai
        $pdf = FacadePdf::loadView('admin.pesanan.receipt', ['order' => $order]);
        return $pdf->download('receipt.pdf');

        
    }


    public function index()
    {

        
        $pesanan = Pesanan::join('pemesan', 'pesanan.pemesan_id', '=', 'pemesan.id')
        ->join('perjalanan', 'pesanan.perjalanan_id', '=', 'perjalanan.id')
        ->join('jenis_bayar', 'pesanan.jenis_bayar_id', '=', 'jenis_bayar.id')
        ->join('tbl_mobil', 'pesanan.mobil_id', '=', 'tbl_mobil.id')
        ->select('pesanan.*', 'pemesan.nama as nama_pemesan', 'perjalanan.asal', 'perjalanan.tujuan', 'jenis_bayar.jenis as jenis_bayar', 'tbl_mobil.nama as nama_mobil')
        ->get();
        $mobil = DB::table('tbl_mobil')->get();

        return view('admin.pesanan.index', compact('pesanan','mobil'));

        

    }

    public function create()
    {
        //

        $pemesan = DB::table('pemesan')->get();
        $jenis_bayar = DB::table('jenis_bayar')->get();
        $mobil = DB::table('tbl_mobil')->get();
        $perjalanan = DB::table('perjalanan')->get();
        return view ('admin.pesanan.create', compact('pemesan','jenis_bayar','mobil','perjalanan'));


    }


    public function store(Request $request){
        $this->validate($request,[
            'harga' => 'required|max:11',
            'tgl_pinjam' =>  'required',
            'tgl_kembali' => 'required',
        ],
        [
            'harga.required' => 'Harga wajib diisi',
            'harga.max' => 'Harga maksimal 11 angka',
            'tgl_pinjam' => 'Tanggal pinjam wajib diisi',
            'tgl_kembali' => 'Tanggal kembali wajib diisi',
        ]
      );

      //tambah data menggunakan query builder
      DB::table('pesanan')->insert([
        'harga'=>$request->harga,
        'tgl_pinjam'=>$request->tgl_pinjam,
        'tgl_kembali'=>$request->tgl_kembali,
        'pemesan_id' =>$request->pemesan,
        'jenis_bayar_id' =>$request->jenis_bayar,
        'mobil_id' =>$request->mobil,
        'perjalanan_id'=>$request->perjalanan,

    ]);
    return redirect('/pesanan')->with('success', 'Data pesanan berhasil di tambahkan!');

    }

    public function show(string $id)
    {
        
        $pesanan = Pesanan::join('pemesan', 'pesanan.pemesan_id', '=', 'pemesan.id')
        ->join('perjalanan', 'pesanan.perjalanan_id', '=', 'perjalanan.id')
        ->join('jenis_bayar', 'pesanan.jenis_bayar_id', '=', 'jenis_bayar.id')
        ->join('tbl_mobil', 'pesanan.mobil_id', '=', 'tbl_mobil.id')
        ->select('pesanan.*', 'pemesan.nama as nama_pemesan', 'perjalanan.asal', 'perjalanan.tujuan', 'jenis_bayar.jenis as jenis_bayar', 'tbl_mobil.nama as nama_mobil')
        ->where('pesanan.id',$id)
        ->get();

        return view('admin.pesanan.detail', compact('pesanan'));
        
    }

    public function edit(string $id){

        $pesanan = Pesanan::find($id);

        // $pesanan = DB::table('pesanan')->get();
        $pemesan = DB::table('pemesan')->get();
        $jenis_bayar = DB::table('jenis_bayar')->get();
        $mobil = DB::table('tbl_mobil')->get();
        $perjalanan = DB::table('perjalanan')->get();
        return view ('admin.pesanan.edit', compact('pemesan','jenis_bayar','mobil','perjalanan','pesanan'));

    }

    public function update(Request $request, string $id)
    {

        $this->validate($request,[
            'harga' => 'required|max:11',
            'tgl_kembali' => 'required',
        ],
        [
            'harga.required' => 'Harga wajib diisi',
            'harga.max' => 'Harga maksimal 11 angka',
            'tgl_kembali' => 'Tanggal kembali wajib diisi',
        ]);

        $pesanan = pesanan::find($id);
        $pesanan->harga = $request->input('harga');
        $pesanan->tgl_kembali = $request->input('tgl_kembali');
        // $pesanan->pemesan_id = $request->input('pemesan');
        // $pesanan->jenis_bayar_id = $request->input('jenis_bayar');
        // $pesanan->mobil_id = $request->input('mobil');
        // $pesanan->perjalanan_id = $request->input('perjalanan');
        $pesanan->save();

        return redirect('/pesanan')->with('success', 'Data pesanan berhasil di edit!');




    //   DB::table('pesanan')->where('id',$request->$id)->update([

    //     'harga'=>$request->harga,
    //     'tgl_pinjam'=>$request->tgl_pinjam,
    //     'tgl_kembali'=>$request->tgl_kembali,
    //     'pemesan_id' =>$request->pemesan,
    //     'jenis_bayar_id' =>$request->jenis_bayar,
    //     'mobil_id' =>$request->mobil,
    //     'perjalanan_id'=>$request->perjalanan,
    // ]);
    //     return redirect('/pesanan');



    }

    public function destroy(string $id)
    {
        DB::table('pesanan')->where('id', $id)->delete();
        return redirect('/pesanan')->with('success', 'Data pesanan berhasil di hapus!');
    }




}

<?php

namespace App\Http\Controllers;

use App\Models\JenisBayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JenisController extends Controller
{
    //
    public function index()
    {

        // sintaks menggunakan eloquent (ORM)
        $jenis = JenisBayar::all();
        return view ('admin.jenis.index', compact('jenis'));

        // $merks = Merk::all();
        // return view('admin.merk.index', ['merks' => $merks]);
    }

    public function create()
    {
        //
        return view('admin.jenis.create');
    }

    public function store(Request $request)
    {
        //
         //tambah data eloquent
        //  $tbl_merk = new tbl_merk;
        //  $tbl_merk->merk = $request->merk;
        //  $tbl_merk->save();
        //  return redirect('/tbl_merk');

        $this->validate($request, [
            'nama' => 'required|max:20',
        ],
        [
            'nama.required' => ' Wajib diisi',
            'nama.max' => 'Tidak lebih dari 20 karakter',
        ]);

        JenisBayar::create([
            'jenis' => $request->input('nama'),
        ]);

        return redirect('/jenis')->with('success', 'Data pembayaran berhasil ditambahkan!');

    
    }


    public function edit(string $id)
    {
        //
        $jenis = JenisBayar::all()->where('id', $id);
        return view ('admin.jenis.edit', compact('jenis'));
    }


    public function update(Request $request, string $id)
    {
        //
        // $tbl_merk = tbl_merk::find($request->id);
        // $tbl_merk->merk = $request->merk;
        // $tbl_merk->save();
        // return redirect('/tbl_merk');


        $this->validate($request, [
            'nama' => 'required|max:20',
        ],
        [
            'nama.required' => ' Wajib diisi',
            'nama.max' => 'Tidak lebih dari 20 karakter',
        ]);


        $jenis = JenisBayar::find($id);
        $jenis->jenis = $request->input('nama');
        $jenis->save();

        return redirect('/jenis')->with('success', 'Data pembayaran berhasi diedit!');
    }


    public function delete($id)
    {
        $jenis = JenisBayar::find($id);

        if (!$jenis) {
            return redirect('/jenis')->with('error', 'Data tidak ditemukan!');
        }

        $jenis->delete();

        return redirect('/jenis')->with('success', 'Data berhasil dihapus!');
    }


}

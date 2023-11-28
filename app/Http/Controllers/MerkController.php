<?php

namespace App\Http\Controllers;

use App\Models\tbl_merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        // sintaks menggunakan eloquent (ORM)
        $tbl_merk = tbl_merk::all();
        return view ('admin.merk.index', compact('tbl_merk'));

        // $merks = Merk::all();
        // return view('admin.merk.index', ['merks' => $merks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.merk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

        tbl_merk::create([
            'merk' => $request->input('nama'),
        ]);

        return redirect('/tbl_merk')->with('success', 'Data merk berhasil ditambahkan!');

    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tbl_merk = tbl_merk::all()->where('id', $id);
        return view ('admin.merk.edit', compact('tbl_merk'));
    }

    /**
     * Update the specified resource in storage.
     */
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


        $merk = tbl_merk::find($id);
        $merk->merk = $request->input('nama');
        $merk->save();

        return redirect('/tbl_merk')->with('success', 'Data merk berhasil diedit!!');
    }


    public function delete($id)
    {
        $merk = tbl_merk::find($id);

        if (!$merk) {
            return redirect('/tbl_merk')->with('error', 'Data tidak ditemukan!');
        }

        $merk->delete();

        return redirect('/tbl_merk')->with('success', 'Data berhasil dihapus!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}

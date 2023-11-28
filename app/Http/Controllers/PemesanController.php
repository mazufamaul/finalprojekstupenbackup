<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pemesan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;




class PemesanController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesans = Pemesan::all('id', 'nama', 'alamat');
        return view('admin.pemesan.index', ["orderers" => $pemesans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pemesan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenisKelamin' => 'required',
            'ktp' => 'image|file|required'
        ], [
            'nama.required' => 'Nama harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'jenisKelamin.required' => 'Jenis kelamin harus diisi',
            'ktp.required' => 'Foto KTP harus ada'
        ]);

        $filename = Str::ulid() . "." . $request->file('ktp')->extension();
        $request->file('ktp')->move(public_path('storage/pemesan'), $filename);
        $data['ktp'] = "storage/pemesan/" . $filename;

        Pemesan::create([
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'jenis_kelamin' => $data['jenisKelamin'],
            'ktp' => $data['ktp']
        ]);

        return redirect()->route('pemesan.index')->with('success', 'Data pemesan berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pemesan = Pemesan::find($id);

        $pemesan->jenis_kelamin = $pemesan->jenis_kelamin == "L" ? "Laki-laki" : "Perempuan";
        // 

        return view('admin.pemesan.detail', ['data' => $pemesan]);
    }

    



    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemesan = Pemesan::find($id);
        return view('admin.pemesan.edit', ['data' => $pemesan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return public_path();
        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenisKelamin' => 'required',
            'ktpLama' => 'required',
            'ktp' => 'image|file'
        ], [
            'nama.required' => 'Nama harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'jenisKelamin.required' => 'Jenis kelamin harus diisi'
        ]);

        if (isset($data['ktp'])) {
            $filename = Str::ulid() . "." . $request->file('ktp')->extension();
            File::delete(public_path('\\') . $data['ktpLama']);
            $request->file('ktp')->move(public_path('storage/pemesan'), $filename);
            $filename = 'storage/pemesan/' . $filename;
        } else {
            $filename = $data['ktpLama'];
        }

        $pemesan = Pemesan::find($id);
        $pemesan->update([
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'jenis_kelamin' => $data['jenisKelamin'],
            'ktp' => $filename
        ]);

        return redirect()->route('pemesan.index')->with('success', 'Data pemesan berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemesan = Pemesan::find($id);
        File::delete(public_path('\\') . $pemesan['ktp']);
        $pemesan->delete();
        return redirect()->route('pemesan.index')->with('success', 'Data pemesan berhasil di hapus!');
    }
}

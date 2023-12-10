<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\tbl_mobil;
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
        $pemesans = Pemesan::all();
        return view('admin.pemesan.index', ["orderers" => $pemesans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mobil = DB::table('pemesan')->get();
        return view ('admin.pemesan.create', compact('mobil'));
        // return view('admin.pemesan.create');
        
    }


    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'nama' => 'required',
    //         'no_telepon' => 'required:max:11',
    //         'alamat' => 'required',
    //         'ktp' => 'image|file|required',
    //         'mobil' => 'required|max:50',
    //         'tanggal_pinjam' => 'required',
    //         'tanggal_kembali' => 'required',
    //     ], [
    //         'nama.required' => 'Nama harus diisi',
    //         'no_telepon.required' => 'No telepon wajib diisi',
    //         'no_telepon.max' => 'Max 11',
    //         'alamat.required' => 'Alamat harus diisi',
    //         'ktp.required' => 'Foto KTP harus ada',
    //         'mobil.required' => 'Mobil wajib diisi',
    //         'mobil.max' => 'Max 50',
    //         'tanggal_pinjam.required' => 'Tanggal Pinjam wajib diisi',
    //         'tanggal_kembali.required' => 'Tanggal Kembali wajib diisi',
            
            
    //     ]);

    //     $filename = Str::ulid() . "." . $request->file('ktp')->extension();
    //     $request->file('ktp')->move(public_path('storage/pemesan'), $filename);
    //     $data['ktp'] = "storage/pemesan/" . $filename;

    //     Pemesan::create([
    //         'nama' => $data['nama'],
    //         'no_telepon' => $data['no_telepon'],
    //         'alamat' => $data['alamat'],
    //         'jenis_kelamin' => $data['jenisKelamin'],
    //         'mobil' => $data['mobil'],
    //         'tanggal_pinjam' => $data['tanggal_pinjam'],
    //         'tanggal_kembali' => $data['tanggal_kembali'],
    //         'ktp' => $data['ktp']
    //     ]);

    //     return redirect()->route('pemesan.index')->with('success', 'Data pemesan berhasil di tambahkan!');
    // }

    // batassss

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:30',
            'no_telepon' => 'required|max:11',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            'mobil' => 'required|max:50',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required', // sesuaikan dengan kebutuhan
        ],
        [
            'nama.required'=> 'Nama mobil wajib diisi',
            'nama.max' => 'Nama maksimal 30 karakter',

            'no_telepon.required' => 'No Telepon wajib diisi',
            'no_telepon.max' => 'No Telepon max 11',

            'alamat.required' => 'Alamat wajib diisi',

            'foto.required' => 'Foto ktp wajib diisi',
            'foto.max' => 'Maksimal 1 MB',
            'foto.image' => 'File ektensi harus jpg,jpeg,png,gif',

            'mobil.required' => 'Mobil wajib diisi',
            'mobil.max' => 'Mobil max 11',

            'tanggal_pinjam.required' => 'Tanggal Pinjam wajib diisi',
            'tanggal_kembali.required' => 'Tanggal Kembali wajib diisi',

        ]
    );

    
        if(!empty($request->foto)){
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('admin/pemesan'), $fileName);
        } else{
            $fileName = '';
        }
        //tambah data menggunakan query builder
        DB::table('pemesan')->insert([
            'nama'=>$request->nama,
            'no_telepon'=>$request->no_telepon,
            'alamat'=>$request->alamat,
            'ktp'=>$fileName,
            'mobil'=>$request->mobil,
            'tanggal_pinjam'=>$request->tanggal_pinjam,
            'tanggal_kembali'=>$request->tanggal_kembali,
            
        ]);
        return redirect()->route('pemesan.index')->with('success', 'Data pemesan berhasil di tambahkan!');
        // return redirect('/tbl_mobil')->with('success', 'Data mobil berhasil ditambahkan!');
        

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pemesan = Pemesan::find($id);

        // $pemesan->jenis_kelamin = $pemesan->jenis_kelamin == "L" ? "Laki-laki" : "Perempuan";
        // 

        return view('admin.pemesan.detail', ['data' => $pemesan]);

        
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $pemesan = Pemesan::find($id);
        // return view('admin.pemesan.edit', ['data' => $pemesan]);

        // $tbl_merk = DB::table('tbl_merk')->get();
        $pemesan = DB::table('pemesan')->where('id',$id)->get();
        return view ('admin.pemesan.edit', compact('pemesan'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return public_path();
        $data = $request->validate([
            'nama' => 'required|max:30',
            'no_telepon' => 'required|max:11',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            'mobil' => 'required|max:50',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required', // sesuaikan dengan kebutuhan
        ], [
            'nama.required'=> 'Nama mobil wajib diisi',
            'nama.max' => 'Nama maksimal 30 karakter',

            'no_telepon.required' => 'No Telepon wajib diisi',
            'no_telepon.max' => 'No Telepon max 11',

            'alamat.required' => 'Alamat wajib diisi',

            'foto.required' => 'Foto ktp wajib diisi',
            'foto.max' => 'Maksimal 1 MB',
            'foto.image' => 'File ektensi harus jpg,jpeg,png,gif',

            'mobil.required' => 'Mobil wajib diisi',
            'mobil.max' => 'Mobil max 11',

            'tanggal_pinjam.required' => 'Tanggal Pinjam wajib diisi',
            'tanggal_kembali.required' => 'Tanggal Kembali wajib diisi',
        ]);

        //update foto
        $foto = DB::table('pemesan')->select('ktp')->where('id', $request->id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->ktp;
        }

        if(!empty($request->foto)){
            //jika ada foto lama maka hapus fotonya 
        if(!empty($namaFileFotoLama->foto)) unlink('admin/pemesan'.$namaFileFotoLama->foto);
        //proses ganti foto
        $fileName = 'foto-'.$request->id . '.' . $request->foto->extension();
        $request->foto->move(public_path('admin/pemesan'), $fileName);
        } 
        else {
            $fileName = '';
        }

        DB::table('pemesan')->where('id',$request->id)->update([
            'nama'=>$request->nama,
            'no_telepon'=>$request->no_telepon,
            'alamat'=>$request->alamat,
            'ktp'=>$fileName,
            'mobil'=>$request->mobil,
            'tanggal_pinjam'=>$request->tanggal_pinjam,
            'tanggal_kembali'=>$request->tanggal_kembali,
        ]);

        return redirect()->route('pemesan.index')->with('success', 'Data pemesan berhasil di Update!');

    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $pemesan = Pemesan::find($id);
    //     File::delete(public_path('\\') . $pemesan['ktp']);
    //     $pemesan->delete();
    //     return redirect()->route('pemesan.index')->with('success', 'Data pemesan berhasil di hapus!');
    // }

    public function destroy(string $id)
    {
        //
        DB::table('pemesan')->where('id', $id)->delete();
        return redirect()->route('pemesan.index')->with('success', 'Data pemesan berhasil di hapus!');
    }
}

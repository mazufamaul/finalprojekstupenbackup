<?php

namespace App\Http\Controllers;

use App\Models\tbl_mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        return view ('admin.mobil.index', compact('mobil'));



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tbl_merk = DB::table('tbl_merk')->get();
        return view ('admin.mobil.create', compact('tbl_merk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:30',
            'warna' => 'required|max:20',
            'harga' => 'required|max:11',
            'no_polisi' => 'required|max:10',
            'jumlah_kursi' => 'required|max:1',
            'tahun_beli' => 'required|max:4',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024', // sesuaikan dengan kebutuhan
            'id_merk' => 'required|exists:tbl_merk,id',
        ],
        [
            'nama.required'=> 'Nama mobil wajib diisi',
            'nama.max' => 'Nama maksimal 30 karakter',
            'warna.required' => 'Warna wajib diisi',
            'warna.max' => 'Warna max 10',
            'harga.required' => 'Harga wajib diisi',
            'harga.max' => 'Harga max 11',
            'no_polisi.required' => 'No polisi wajib diisi',
            'no_polisi.max' => 'No polisi max 10',
            'jumlah_kursi.required' => 'Jumlah kursi wajib diisi',
            'jumlah_kursi.max' => 'Jumlah kursi lebih',
            'tahun_beli.required' => 'Tahun beli wajib diisi',
            'tahun_beli.max' => 'Tahun beli tidak lebih dari 4 digit',
            'foto.max' => 'Maksimal 1 MB',
            'foto.image' => 'File ektensi harus jpg,jpeg,png,gif',

        ]
    );

        

        if(!empty($request->foto)){
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('admin/img'), $fileName);
        } else{
            $fileName = '';
        }
        //tambah data menggunakan query builder
        DB::table('tbl_mobil')->insert([
            'nama'=>$request->nama,
            'warna'=>$request->warna,
            'harga'=>$request->harga,
            'no_polisi'=>$request->no_polisi,
            'jumlah_kursi'=>$request->jumlah_kursi,
            'tahun_beli'=>$request->tahun_beli,
            'gambar'=>$fileName,
            'id_merk'=>$request->id_merk,
        ]);
        return redirect('/tbl_mobil')->with('success', 'Data mobil berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $mobil = tbl_mobil::join('tbl_merk','id_merk', '=', 'tbl_merk.id')
        ->select('tbl_mobil.*', 'tbl_merk.merk as jenis')
        ->where('tbl_mobil.id', $id)
        ->get();
        return view ('admin.mobil.detail', compact('mobil'));

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tbl_merk = DB::table('tbl_merk')->get();
        $mobil = DB::table('tbl_mobil')->where('id',$id)->get();
        return view ('admin.mobil.edit', compact('mobil' , 'tbl_merk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // validation sama seperti store
        $this->validate($request, [
            'nama' => 'required|max:30',
            'warna' => 'required|max:20',
            'harga' => 'required|max:11',
            'no_polisi' => 'required|max:10',
            'jumlah_kursi' => 'required|max:1',
            'tahun_beli' => 'required|max:4',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024', // sesuaikan dengan kebutuhan
            'id_merk' => 'required|exists:tbl_merk,id',
        ],
        [
            'nama.required'=> 'Nama mobil wajib diisi',
            'nama.max' => 'Nama maksimal 30 karakter',
            'warna.required' => 'Warna wajib diisi',
            'warna.max' => 'Warna max 10',
            'harga.required' => 'Harga wajib diisi',
            'harga.max' => 'Harga max 11',
            'no_polisi.required' => 'No polisi wajib diisi',
            'no_polisi.max' => 'No polisi max 10',
            'jumlah_kursi.required' => 'Jumlah kursi wajib diisi',
            'jumlah_kursi.max' => 'Jumlah kursi lebih',
            'tahun_beli.required' => 'Tahun beli wajib diisi',
            'tahun_beli.max' => 'Tahun beli tidak lebih dari 4 digit',
            'foto.max' => 'Maksimal 1 MB',
            'foto.image' => 'File ektensi harus jpg,jpeg,png,gif',

        ]
    );

        //update foto
        $foto = DB::table('tbl_mobil')->select('gambar')->where('id', $request->id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->gambar;
        }

        if(!empty($request->foto)){
            //jika ada foto lama maka hapus fotonya 
        if(!empty($namaFileFotoLama->foto)) unlink('admin/img'.$namaFileFotoLama->foto);
        //proses ganti foto
        $fileName = 'foto-'.$request->id . '.' . $request->foto->extension();
        $request->foto->move(public_path('admin/img'), $fileName);
        } 
        else {
            $fileName = '';
        }

        DB::table('tbl_mobil')->where('id',$request->id)->update([
            'nama'=>$request->nama,
            'warna'=>$request->warna,
            'harga'=> $request->harga,
            'no_polisi'=>$request->no_polisi,
            'jumlah_kursi'=>$request->jumlah_kursi,
            'tahun_beli'=>$request->tahun_beli,
            'gambar'=>$fileName,
            'id_merk'=>$request->id_merk,
        ]);
        return redirect('/tbl_mobil')->with('success', 'Data mobil berhasil di Update!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('tbl_mobil')->where('id', $id)->delete();
        return redirect('/tbl_mobil')->with('success', 'Data mobil berhasil di hapus!');
    }
}

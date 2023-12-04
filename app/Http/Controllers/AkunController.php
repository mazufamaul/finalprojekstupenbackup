<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class AkunController extends Controller
{
    //
    
    
    public function index()
    {
    $akun = Akun::all();
    return view('admin.akun.index',['akun' => $akun]);
    }


    public function create()
    {
        //
        return view('admin.akun.create');
    }


    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'nama' => 'required|max:50',
            'username' => 'required|max:15|unique:akun',
            'password' => 'required|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024', // sesuaikan dengan kebutuhan
           
        ],
        [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama Maximal 15',
            'username.required' => 'Username wajib diisi',
            'username.max' => 'Username maximal 15 karakter',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.max' => 'Password Maximal 255',
            'foto.max' => 'Maksimal 1 MB',
            'foto.required' => 'Foto wajib diisi',
            'foto.image' => 'File ektensi harus jpg,jpeg,png,gif',
           
        ]

    );

    if(!empty($request->foto)){
        $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
        $request->foto->move(public_path('admin/img2'), $fileName);
    } else{
        $fileName = '';
    }

    // Enkripsi password sebelum menyimpan ke database
    $hashedPassword = bcrypt($request->password);

    DB::table('akun')->insert([
        'nama'=>$request->nama,
        'username'=>$request->username,
        'foto'=>$fileName,
        'password'=>$hashedPassword,
    ]);
    return redirect()->route('akun.create')->with('success', 'Registrasi berhasil!');
    // return redirect()->to(url('/interface'))->with('success', 'Registrasi berhasil!');
    

    }



    public function show(string $id)
    {
        //
       
        $akun = Akun::find($id);

        if (!$akun) {
            // Handle kasus ketika data tidak ditemukan
            abort(404);
        }

        return view('admin.akun.detail', ['akun' => $akun]);
       
       

    }

    public function destroy(string $id){
        DB::table('akun')->where('id', $id)->delete();
        return redirect()->route('akun.index')->with('success', 'Data Berhasil dihapus!');
    }










}

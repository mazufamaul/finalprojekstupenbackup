<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EmailController extends Controller
{
    //
    public function index()
    {
    $akun = User::all();
    return view('admin.email.index',['akun' => $akun]);
    }

    public function create()
    {
        //
        return view('admin.email.create');
    }



    public function store(Request $request)
    {
       
        $this->validate($request, [
            'nama' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ],
        [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama Maximal 255',
            'email.required' => 'Email wajib diisi',
            'email.max' => 'Email Melebihi 255',
            'password.required' => 'Password wajib diisi',
            'password.max' => 'Password Maximal 255',
        ]);

        // Enkripsi password sebelum menyimpan ke database
        $hashedPassword = bcrypt($request->input('password'));

        User::create([
            'name'=>$request->input('nama'),
            'email'=>$request->input('email'),
            'password'=>$hashedPassword,
        ]);

        return redirect()->route('email.index')->with('success', 'Data Berhasil ditambahkan!');

    
    }

    public function destroy($id)
    {
        $email = User::find($id);

        if (!$email) {
            return redirect()->route('email.index')->with('error', 'Data tidak ditemukan!');
        }

        $email->delete();

        return redirect()->route('email.index')->with('success', 'Data Berhasil dihapus!');
    }


}

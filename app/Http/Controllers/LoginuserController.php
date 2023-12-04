<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\tbl_mobil;
use App\Models\Akun;
use Illuminate\Http\Request;

class LoginuserController extends Controller
{
    //
   


    public function showLoginForm()
    {
        return view('admin.masuk.login');
    }

    public function showLoginFormUser()
    {
        $mobil = tbl_mobil::join('tbl_merk','id_merk', '=', 'tbl_merk.id')
        ->select('tbl_mobil.*', 'tbl_merk.merk as jenis')
        ->get();
        return view ('admin.interface.user', compact('mobil'));
        
    }
        

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],
        [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        // Cek autentikasi menggunakan model Akun
        $akun = Akun::where('username', $credentials['username'])->first();

        if ($akun && password_verify($credentials['password'], $akun->password)) {
            // Jika autentikasi berhasil
            // Auth::login($akun); // Login user
            return redirect()->route('admin.user');
        } else {
            // Jika autentikasi gagal
            return redirect()->route('admin.login')->with('error', 'Login gagal. Cek kembali username dan password.');
        }
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    
    public function index(){
        $akun = Akun::all(); // Or use any other method to retrieve the data
    
        // Pass the $akun variable to the view
        return view('admin.interface.detail', ['akun' => $akun]);
        }

    public function show(string $id)
    {
        //
       
        $akun = Akun::find($id);

        if (!$akun) {
            // Handle kasus ketika data tidak ditemukan
            abort(404);
        }

        return view('admin.interface.detail', ['akun' => $akun]);
       
       

    }


        
}

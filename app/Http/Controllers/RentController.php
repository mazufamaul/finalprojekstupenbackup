<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pemesan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class RentController extends Controller
{
    //
    public function create()
    {
        return view('admin.rent.create');
    }


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

        return redirect()->route('rent.create')->with('success', 'Data pemesan berhasil di tambahkan!');
    }
}

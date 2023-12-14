<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\tbl_mobil;
use App\Models\Pemesan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class RentController extends Controller
{
    //
    public function create(Request $request)
    {

        
       

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

       

        $params = array(
            'transaction_details' => array(
                'order_id' => auth()->user()->email,
                'gross_amount' =>  10000,
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
                
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('admin.rent.create',compact('snapToken'));
        
    }



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
        return redirect()->route('rent.create')->with('success', 'Kami akan menghubungi anda secepatnya!!');
        // return redirect('/tbl_mobil')->with('success', 'Data mobil berhasil ditambahkan!');
        

    }

}

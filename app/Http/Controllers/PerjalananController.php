<?php

namespace App\Http\Controllers;
use App\Models\Perjalanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class PerjalananController extends Controller
{
    //
    public function index()
    {
        $perjalanans = Perjalanan::all();
        return view('admin.perjalanan.index', ['perjalanans' => $perjalanans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.perjalanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'asal' => 'required|max:50',
            'tujuan' => 'required|max:50',
            'jarak' => 'required|numeric',
        ],
        [
            'asal.required' => 'asal wajib diisi',
            'tujuan.required' => 'tujuan wajib diisi',
            'jarak.required' => 'jarak harus diisi',
            'jarak.numeric' => 'harus angka',
        ]
    );
        Perjalanan::create([
            'asal' => $data['asal'],
            'tujuan' => $data['tujuan'],
            'jarak' => $data['jarak'],
        ]
    );
        return redirect()->route('perjalanan.index')->with('success', 'Data perjalanan berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $perjalanans = Perjalanan::find($id);

        $perjalanans;

        return view('admin.perjalanan.detail', ['perjalanans' => $perjalanans]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $perjalanans = Perjalanan::find($id);
        return view('admin.perjalanan.edit', ['perjalanans' => $perjalanans]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate([
            'asal' => 'required|max:50',
            'tujuan' => 'required|max:50',
            'jarak' => 'required|numeric',
        ],
        [
            'asal.required' => 'asal wajib diisi',
            'tujuan.required' => 'tujuan wajib diisi',
            'jarak.required' => 'jarak harus diisi',
            'jarak.numeric' => 'harus angka',
        ]
    );
        $perjalanans = Perjalanan::find($id);
        $perjalanans->update([
            'asal' => $data['asal'],
            'tujuan' => $data['tujuan'],
            'jarak' => $data['jarak'],
        ]);

        return redirect()->route('perjalanan.index')->with('success', 'Data perjalanan berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $perjalanans = Perjalanan::find($id);
        File::delete(public_path('\\') . $perjalanans['jarak']);
        $perjalanans->delete();
        return redirect()->route('perjalanan.index')->with('success', 'Data perjalanan berhasil di hapus!');
    }
}

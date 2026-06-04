<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //akses tabel Mahasiswa
        $mahasiswa = Mahasiswa::with('prodi')->get();
        return view('mahasiswa.index', compact('mahasiswa')); //kirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi input
        $request->validate([
            'npm' => 'required[unique:mahasiswas,npm',
            'nama' => 'required' ,
            'prodi_id' => 'required|Exists::prodi,id' ,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //upload foto
        if ($request->file('foto')) {
            $foto = $request->file('foto'); // ambil file foto
            $nama_foto = time() . '_' . $foto->getClientOriginalName(); // buat nama unik untuk foto
            $foto->storeAs('fotos', $nama_foto, 'public'); // simpan foto di folder storage/app/public/fotos
        } else {
            $nama_foto = null; // jika tidak ada foto, set nama_foto ke null
        }
        $input['foto'] = $nama_foto; // tambahkan nama_foto ke data input

        //simpan data ke database
        Mahasiswa::create($input);

        //redirect ke halaman index dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('succes', 'Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}

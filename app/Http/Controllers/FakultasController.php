<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use LDAP\Result;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // akses tabel fakultas
        $result = Fakultas::all(); //SELECT * FROM fakultas
        //dd($result); //dump data
        return view('fakultas.index', compact('result')); // kirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        //validasi input
        $input = $request->validate([
            'nama_fakultas' => 'required
            unique:fakultas',
            'singkatan' => 'required'
        ]);

        //simpan ke tabel fakultas
        Fakultas::create($input);

        //redirect ke route fakultas.index
        return Redirect()->route('fakultas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($fakultas)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakultas)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($fakultas)
    {
        
    }
}

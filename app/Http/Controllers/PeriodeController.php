<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $result = Periode::all();
      return view('periode.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('periode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'tahun_akademik' => 'required|unique:periode',
            'semester' => 'required|in:1,2'
        ]);

        Periode::create($input);
        return redirect()->route('periode.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($periode)
    {
        $periode = Periode::find($periode);
        return view('periode.edit', compact('periode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Periode $periode)
    {
        $input = $request->validate([
            'tahun_akademik' => 'required|unique:periode,tahun_akademik,' . $periode->id . ',id' ,
            'semester' => 'required|in:1,2'
        ]);

        $periode->update($input);
        return redirect()->route('periode.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periode $periode)
    {
        $periode = Periode::find($periode);
        $periode->delete();
        return redirect()->route('periode.index');
    }
}

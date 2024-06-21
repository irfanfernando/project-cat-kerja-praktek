<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pelanggan'] = Pelanggan::all();
        return view('pelanggan.index', $data);
    }

    public function tampilpelanggan()
    {
        $data['pelanggan'] = Pelanggan::all();
        return view('tampilpelanggan', $data);
    }

    public function tampilanpelanggan()
    {
        $data['pelanggan'] = Pelanggan::all();
        return view('tampilanpelanggan', $data);
    }

    public function cetakpelanggan(){
        $data['pelanggan'] = Pelanggan::all();
        return view('pelanggan.cetakpelanggan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pelanggan = new Pelanggan();
        $pelanggan->nama_pelanggan = $request->tNamaPelanggan;
        $pelanggan->noTelp = $request->tNoTelp;
        $pelanggan->alamat = $request->tAlamat;
        $pelanggan->save();
        return redirect()->route('pelanggan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelanggan = Pelanggan::find($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->nama_pelanggan = $request->tNamaPelanggan;
        $pelanggan->noTelp = $request->tNoTelp;
        $pelanggan->alamat = $request->tAlamat;
        $pelanggan->update();
        return redirect()->route('pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();
        return back();
    }
}

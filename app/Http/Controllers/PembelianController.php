<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;


class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pembelian'] = Pembelian::all();
        return view('pembelian.index', $data);
    }

    public function cetaksuratpo($id){
        $data['pembelian'] = Pembelian::all()->where('id', $id)->first();
        return view('pembelian.cetaksuratpo', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pembelian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pembelian = new Pembelian();
        $pembelian->nomorpo = $request->tnomorpo;
        $pembelian->tanggal = $request->tTanggal;
        $pembelian->nama_supplier = $request->tNamaSupplier;
        $pembelian->nama_barang = $request->tNamaBarang;
        $pembelian->jumlah = $request->tJumlah;
        $pembelian->satuan = $request->tSatuan;
        $pembelian->save();
        return redirect()->route("pembelian");
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
        $pembelian = Pembelian::find($id);
        return view('pembelian.edit', compact('pembelian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->nomorpo = $request->tnomorpo;
        $pembelian->tanggal = $request->tTanggal;
        $pembelian->nama_supplier = $request->tNamaSupplier;
        $pembelian->nama_barang = $request->tNamaBarang;
        $pembelian->jumlah = $request->tJumlah;
        $pembelian->satuan = $request->tSatuan;
        $pembelian->update();
        return redirect()->route("pembelian");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->delete();
        return back();
    }
}

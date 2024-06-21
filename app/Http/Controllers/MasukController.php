<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Stock;
use App\Models\Masuk;

class MasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = DB::select('select masuk.*, stock.nama_barang as brg, stock.gambar_barang as fotobarang from stock, masuk where stock.id = masuk.stock_id');
        return view('masuk.index', ['allMasuk' => $result]);
    }

    public function tampilstokmasuk()
    {
        $result = DB::select('select masuk.*, stock.nama_barang as brg, stock.gambar_barang as fotobarang from stock, masuk where stock.id = masuk.stock_id');
        return view('tampilstokmasuk', ['allMasuk' => $result]);
    }

    public function tampilanstokmasuk()
    {
        $result = DB::select('select masuk.*, stock.nama_barang as brg, stock.gambar_barang as fotobarang from stock, masuk where stock.id = masuk.stock_id');
        return view('tampilanstokmasuk', ['allMasuk' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $masuk = Stock::all();
        return view('masuk.create', compact('masuk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $masuk = new Masuk();
        $masuk->stock_id = $_POST['tNamaBarang'];
        $masuk->tanggal = $request->tTanggal;
        $masuk->keterangan = $request->tKeterangan;
        $masuk->qty = $request->tQty;
        $masuk->save();
        return redirect()->route("masuk");
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
        $masuk = Masuk::with(['stock'])->find($id);
        return view('masuk.edit', compact('masuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $masuk = Masuk::find($id);
        $masuk->tanggal = $request->tTanggal;
        $masuk->keterangan = $request->tKeterangan;
        $masuk->qty = $request->tQty;
        $masuk->update();
        return redirect()->route("masuk");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $masuk = Masuk::find($id);
        $masuk->delete();
        return back();
    }
}

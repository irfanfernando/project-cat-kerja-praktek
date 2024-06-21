<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Stock;
use App\Models\Masuk;
use App\Models\Keluar;

class KeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = DB::select('select keluar.*, stock.nama_barang as brg, stock.gambar_barang as fotobarang from stock, keluar where stock.id = keluar.stock_id');
        return view('keluar.index', ['allKeluar' => $result]);
    }

    public function tampilstokkeluar()
    {
        $result = DB::select('select keluar.*, stock.nama_barang as brg, stock.gambar_barang as fotobarang from stock, keluar where stock.id = keluar.stock_id');
        return view('tampilstokkeluar', ['allKeluar' => $result]);
    }

    public function cetaklaporanmutasi(Request $request){
        $start_date = date('Y-m-d', strtotime($request->input('start_date')));
        $end_date = date('Y-m-d', strtotime($request->input('end_date')));
        $result = DB::table('keluar')
            ->join('stock', 'stock.id', '=', 'keluar.stock_id')
            ->whereBetween('keluar.tanggal', [$start_date, $end_date])
            ->select('keluar.*', 'stock.nama_barang as brg', 'stock.gambar_barang as fotobarang')
            ->get();
        return view('keluar.cetaklaporanmutasi', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keluar = Stock::all();
        return view('keluar.create', compact('keluar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $keluar = new Keluar();
        $keluar->stock_id = $_POST['tNamaBarang'];
        $keluar->tanggal = $request->tTanggal;
        $keluar->penerima = $request->tPenerima;
        $keluar->qty = $request->tQty;
        $keluar->save();
        return redirect()->route("keluar");
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
        $keluar = Keluar::with(['stock'])->find($id);
        return view('keluar.edit', compact('keluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $keluar = Keluar::find($id);
        $keluar->tanggal = $request->tTanggal;
        $keluar->penerima = $request->tPenerima;
        $keluar->qty = $request->tQty;
        $keluar->update();
        return redirect()->route("keluar");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $keluar = Keluar::find($id);
        $keluar->delete();
        return back();
    }
}

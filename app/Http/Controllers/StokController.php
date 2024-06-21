<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Masuk;
use App\Models\Keluar;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['stock'] = Stock::all();
        $data['masuk'] = Masuk::all();
        $data['keluar'] = Keluar::all();
        return view('stock.index', $data);
    }

    public function tampilstok()
    {
        $data['stock'] = Stock::all();
        $data['masuk'] = Masuk::all();
        $data['keluar'] = Keluar::all();
        return view('tampilstok', $data);
    }

    public function tampilanstok()
    {
        $data['stock'] = Stock::all();
        $data['masuk'] = Masuk::all();
        $data['keluar'] = Keluar::all();
        return view('pimpinan.tampilanstok', $data);
    }

    public function cetakstok(){
        $data['stock'] = Stock::all();
        $data['masuk'] = Masuk::all();
        $data['keluar'] = Keluar::all();
        return view('stock.cetakstok', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stock.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'gambar_barang' => 'required|file|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        //ambil ekstensi file 
        $ext = $request->gambar_barang->getClientOriginalExtension();

        //rename nama file 
        $nama_file = "foto-" . time() . "." . $ext;
        $path = $request->gambar_barang->storeAs('public', $nama_file);
  
        $stok = new Stock();
        $stok->nama_barang = $request->tNamaBarang;
        $stok->deskripsi = $request->tDeskripsiBarang;
        $stok->jumlah_barang = $request->tJumlahBarang;
        $stok->gambar_barang = $nama_file;
        $stok->save();
        return redirect()->route('stok');
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
        $stok = Stock::find($id);
        return view('stock.edit', compact('stok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'gambar_barang' => 'required|file|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $stok = Stock::find($id);

        //ambil ekstensi file 
        $ext = $request->gambar_barang->getClientOriginalExtension();

        //rename nama file 
        $nama_file = "foto-" . time() . "." . $ext;
        $path = $request->gambar_barang->storeAs('public', $nama_file);
  
        $stok->nama_barang = $request->tNamaBarang;
        $stok->deskripsi = $request->tDeskripsiBarang;
        $stok->jumlah_barang = $request->tJumlahBarang;
        $stok->gambar_barang = $nama_file;
        $stok->update();
        return redirect()->route('stok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stok = Stock::find($id);
        $stok->delete();
        return back();
    }
}

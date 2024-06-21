<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Pelanggan;
use App\Models\LaporanPenjualan;

class LaporanPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = DB::select('select laporanpenjualan.*, pelanggan.nama_pelanggan as nama_pembeli from pelanggan, laporanpenjualan where pelanggan.id = laporanpenjualan.pelanggan_id');
        return view('laporanpenjualan.index', ['allLaporanPenjualan' => $result]);
    }

    public function tampillaporanpenjualan()
    {
        $result = DB::select('select laporanpenjualan.*, pelanggan.nama_pelanggan as nama_pembeli from pelanggan, laporanpenjualan where pelanggan.id = laporanpenjualan.pelanggan_id');
        return view('tampillaporanpenjualan', ['allLaporanPenjualan' => $result]);
    }

    public function cetaknotapenjualan($id)
    {
        $result = LaporanPenjualan::with(['pelanggan'])->where('id', $id)->first();
        return view('laporanpenjualan.cetaknotapenjualan', ['notapenjualan' => $result]);
    }

    public function cetaklaporanpenjualan(Request $request){
        $start_date = date('Y-m-d', strtotime($request->input('start_date')));
        $end_date = date('Y-m-d', strtotime($request->input('end_date')));
        $result = DB::table('laporanpenjualan')
            ->join('pelanggan', 'pelanggan.id', '=', 'laporanpenjualan.pelanggan_id')
            ->whereBetween('laporanpenjualan.tanggal', [$start_date, $end_date])
            ->select('laporanpenjualan.*', 'pelanggan.nama_pelanggan as nama_pembeli')
            ->get();
        return view('laporanpenjualan.cetaklaporanpenjualan', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $laporanpenjualan = Pelanggan::all();
        return view('laporanpenjualan.create', compact('laporanpenjualan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $laporanpenjualan = new LaporanPenjualan();
        $laporanpenjualan->pelanggan_id = $_POST['tNamaPelanggan'];
        $laporanpenjualan->tanggal = $request->tTanggal;
        $laporanpenjualan->nota_penjualan = $request->tNotaPenjualan;
        $laporanpenjualan->jenis_barang = $request->tJenisBarang;
        $laporanpenjualan->jumlah = $request->tJumlah;
        $laporanpenjualan->satuan = $request->tSatuan;
        $laporanpenjualan->save();
        return redirect()->route("laporanpenjualan");
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
        $laporanpenjualan = LaporanPenjualan::with(['pelanggan'])->find($id);
        return view('laporanpenjualan.edit', compact('laporanpenjualan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $laporanpenjualan = LaporanPenjualan::find($id);        
        $laporanpenjualan->tanggal = $request->tTanggal;
        $laporanpenjualan->nota_penjualan = $request->tNotaPenjualan;
        $laporanpenjualan->jenis_barang = $request->tJenisBarang;
        $laporanpenjualan->jumlah = $request->tJumlah;
        $laporanpenjualan->satuan = $request->tSatuan;
        $laporanpenjualan->update();
        return redirect()->route("laporanpenjualan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laporanpenjualan = LaporanPenjualan::find($id);
        $laporanpenjualan->delete();
        return back();
    }
}

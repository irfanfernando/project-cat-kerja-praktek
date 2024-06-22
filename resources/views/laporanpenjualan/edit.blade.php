@extends('home')

@section('content')
    <style>
            input[type=text],
            select {
                width: 100%;
                padding: 8px 10px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            input[type=submit] {
                width: 100%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap4.min.css">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Penjualan</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('laporanpenjualan.update', $laporanpenjualan->id) }}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="namapelanggan">Nama Barang</label> :
                    <label for="inputnamapelanggan" style="color: green">{{ $laporanpenjualan->pelanggan->nama_pelanggan }}</label>
                </div>

                <div class="form-group">
                    <label for="inputtanggal">Tanggal</label>
                    <input type="date" class="form-control" id="inputtanggal" name="tTanggal" value="{{ $laporanpenjualan->tanggal }}" required>
                </div>

                <div class="form-group">
                    <label for="notapenjualan">Nota Penjualan</label>
                    <input type="text" name="tNotaPenjualan" id="notapenjualan" value="{{ $laporanpenjualan->nota_penjualan }}" placeholder="Masukkan Nota Penjualan">
                </div>

                <div class="form-group">
                    <label for="jenisbarang">Jenis Barang</label>
                    <input type="text" name="tJenisBarang" id="jenisbarang" value="{{ $laporanpenjualan->jenis_barang }}" placeholder="Masukkan Jenis Barang">
                </div>

                <div class="form-group">
                    <label for="inputjumlah">Jumlah</label>
                    <input type="number" class="form-control" id="inputjumlah" placeholder="Masukkan Jumlah Barang"
                        name="tJumlah" value="{{ $laporanpenjualan->jumlah }}" required>
                </div>

                <div class="form-group">
                    <label for="inputsatuan">Harga</label>
                    <input type="number" class="form-control" id="inputsatuan" placeholder="Masukkan Satuan Barang"
                        name="tSatuan" value="{{ $laporanpenjualan->satuan }}" required>
                </div><br>

                <button type="submit" class="btn btn-warning">Ubah</button>
            </form>
        </div>
    </div>
@endsection

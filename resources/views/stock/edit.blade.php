@extends('home')

@section('content')
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
            <h3 class="card-title">Ubah Stok</h3>
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
            <form method="POST" action="{{ route('stok.update', $stok->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="inputnamabarang">Nama Barang</label>
                    <input type="text" class="form-control" id="inputnamabarang" placeholder="Masukkan Nama Barang"
                        name="tNamaBarang" value="{{ $stok->nama_barang }}" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deksripsi</label>
                    <textarea name="tDeskripsiBarang" id="deskripsi" cols="10" rows="5" class="form-control" required>{{ $stok->deskripsi }}</textarea>
                </div>

                <div class="form-group">
                    <label for="inputjumlahbarang">Jumlah Barang</label>
                    <input type="number" class="form-control" id="inputjumlahbarang" placeholder="Masukkan Jumlah Barang"
                        name="tJumlahBarang" value="{{ $stok->jumlah_barang }}" required>
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar Barang</label>
                    <input type="file" name="gambar_barang" id="gambar_barang" class="form-control">
                </div><br>

                <button type="submit" class="btn btn-warning">Ubah</button>
            </form>
        </div>
    </div>
@endsection

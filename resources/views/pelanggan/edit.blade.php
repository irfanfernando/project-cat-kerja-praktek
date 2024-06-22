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
            <h3 class="card-title">Ubah Pelanggan</h3>
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
            <form method="POST" action="{{ route('pelanggan.update', $pelanggan->id) }}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="inputnamapelanggan">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="inputnamapelanggan" pattern="[^\d]+" placeholder="Masukkan Nama Pelanggan"
                        name="tNamaPelanggan" value="{{ $pelanggan->nama_pelanggan }}" required>
                </div>

                <div class="form-group">
                    <label for="inputnotelp">No Telepon</label>
                    <input type="text" class="form-control" id="inputnotelp" pattern="[0-9]+" placeholder="Masukkan No Telepon" minlength="10" maxlength="13"
                        name="tNoTelp" value="{{ $pelanggan->noTelp }}" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="tAlamat" id="alamat" cols="10" rows="5" class="form-control" required>{{ $pelanggan->alamat }}</textarea>
                </div>

                <button type="submit" class="btn btn-warning">Ubah</button>
            </form>
        </div>
    </div>
@endsection

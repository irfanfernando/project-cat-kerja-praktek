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
            <h3 class="card-title">Data Stock Keluar</h3>
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
            <a href="{{ route('keluar.create') }}"><button type="button" class="btn btn-primary">Tambah
                    Stok Keluar</button></a>
            <a href="{{ route('keluar.cetaklaporanmutasi') }}"><button type="button" class="btn btn-info">Cetak
                    Laporan Mutasi</button></a><br><br>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar Barang</th>
                        <th>Nama Barang</th>
                        <th>Tanggal</th>
                        <th>Penerima</th>
                        <th>Qty</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allKeluar as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}.</td>
                            <td><img src="{{ asset('storage/' . $item->fotobarang) }}" width="100px" alt="..."class="img-thumbnail"></td>
                            <td>{{ $item->brg }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->penerima }}</td>
                            <td>{{ $item->qty }}</td>
                            <td><a href="{{ route('keluar.edit', $item->id) }}"><button type="button"
                            class="btn btn-warning">Ubah</button></a></td>

                            <!-- <td>
                                <form method="POST" action="{{ route('keluar.destroy', $item->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a href="{{ route('keluar.edit', $item->id) }}"><button type="button"
                                            class="btn btn-warning">Ubah</button></a>
                                    <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip"
                                        title='Delete'>Hapus</button>
                                </form>
                            </td> -->

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection

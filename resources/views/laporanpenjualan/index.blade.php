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
            <h3 class="card-title">Laporan Penjualan</h3>
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
            <a href="{{ route('laporanpenjualan.create')}}"><button type="button" class="btn btn-primary">Tambah Penjualan</button></a>
            <a href="{{ route('laporanpenjualan.cetaklaporanpenjualan') }}"><button type="button" class="btn btn-info">Cetak Laporan Penjualan</button></a><br><br>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Nota Penjualan</th>
                        <th>Jenis Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allLaporanPenjualan as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}.</td>
                            <td>{{ $item->nama_pembeli }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->nota_penjualan }}</td>
                            <td>{{ $item->jenis_barang }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>
                                <form method="POST" action="{{ route('laporanpenjualan.destroy', $item->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a href="{{ route('laporanpenjualan.edit', $item->id) }}"><button type="button"
                                            class="btn btn-warning">Ubah</button></a>
                                    <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip"
                                        title='Delete'>Hapus</button>
                                    <a href="{{ route('laporanpenjualan.cetaknotapenjualan', $item->id) }}"><button type="button"
                                        class="btn btn-success">Cetak</button></a>
                                </form>
                            </td>

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

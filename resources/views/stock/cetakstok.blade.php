<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CETAK LAPORAN STOK</title>
    <style>
        p {
            font-size: 30px;
        }
    </style>

</head>

<body>
    <div class="form-group">
        <center>
            <p><b>Laporan Data Stok</b></p>
        </center>

        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead class="thead-dark">
                <tr align="center">
                    <th scope="col">No</th>
                    <th scope="col">Gambar Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Jumlah Barang</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($stock as $item)
                @php
                    $masukQty = $masuk->where('stock_id', $item->id)->pluck('qty')->first();
                    $keluarQty = $keluar->where('stock_id', $item->id)->pluck('qty')->first();
                @endphp

                        <tr>
                            <td>{{ $loop->index + 1 }}.</td>
                            <td><img src="{{ asset('storage/' . $item->gambar_barang) }}" width="100px" alt="..."class="img-thumbnail"></td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->jumlah_barang + $masukQty - $keluarQty }}</td>
                        </tr>
                @endforeach  
            </tbody>
        </table>


    </div>
</body>
<script>
    window.print();
</script>

</html>

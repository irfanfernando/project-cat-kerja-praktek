<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        p {
            font-size: 30px;
        }

        /* Sembunyikan label dan input tanggal pada saat mencetak */
        @media print {
            label[for="start_date"],
            label[for="end_date"],
            input[type="date"],
            button[type="submit"] {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="form-group">
        <form action="{{ route('laporanpenjualan.filter') }}" method="POST">
            @csrf
            <label for="start_date">Dari Tanggal:</label>
            <input type="date" name="start_date" id="start_date">
            <label for="end_date">Hingga Tanggal:</label>
            <input type="date" name="end_date" id="end_date">
            <button type="submit">Filter</button>
        </form>
    </div><br><br>

    <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
        <thead class="thead-dark">
            <tr align="center">
                <th scope="col">No</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nota Penjualan</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Satuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result as $item)
            <tr>
                <td>{{ $loop->index + 1 }}.</td>
                <td>{{ $item->nama_pembeli }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->nota_penjualan }}</td>
                <td>{{ $item->jenis_barang }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->satuan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

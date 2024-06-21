<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Mutasi Barang</title>
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
        <form action="{{ route('keluar.filter') }}" method="POST">
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
                <th scope="col">Gambar Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Penerima</th>
                <th scope="col">Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result as $item)
            <tr>
                <td>{{ $loop->index + 1 }}.</td>
                <td><img src="{{ asset('storage/' . $item->fotobarang) }}" width="100px" alt="..." class="img-thumbnail"></td>
                <td>{{ $item->brg }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->penerima }}</td>
                <td>{{ $item->qty }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

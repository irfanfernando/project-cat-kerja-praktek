<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor Faktur</title>
    <style>
        /* CSS untuk styling nota kasir */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>NOMOR FAKTUR</h1>
            <h2>CV Manau Jaya Palembang</h2>
        </div><br>
        <table>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><b>{{ $notapenjualan->tanggal}}</b></td>
            </tr>
            <tr>
                <td>Nomor Faktur</td>
                <td>:</td>
                <td><b>{{ $notapenjualan->nota_penjualan}}</b></td>
            </tr>
            <tr>
                <td>Nama Pelanggan</td>
                <td>:</td>
                <td><b>{{ $notapenjualan->pelanggan->nama_pelanggan}}</b></td>
            </tr>
        </table><br><br>
        <table>
            <tr>
                <th>Nama Barang</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>

            <tr>
                    <td>{{ $notapenjualan->jenis_barang }}</td>
                    <td>Rp. {{ $notapenjualan->satuan }}</td>
                    <td>{{ $notapenjualan->jumlah }}</td>
                    <td>Rp. {{ $notapenjualan->satuan * $notapenjualan->jumlah }}</td>
            </tr>
        </table>
        <hr>
        <p>Total: <b>Rp. {{ $notapenjualan->satuan * $notapenjualan->jumlah }}</b></p>
        <hr>
        <p>Terima kasih atas kunjungan Anda!</p>
    </div>
</body>
</html>

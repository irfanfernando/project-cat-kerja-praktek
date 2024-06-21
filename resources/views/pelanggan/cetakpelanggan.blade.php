<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CETAK LAPORAN PELANGGAN</title>
    <style>
        p {
            font-size: 30px;
        }
    </style>

</head>

<body>
    <div class="form-group">
        <center>
            <p><b>Laporan Data Pelanggan</b></p>
        </center>

        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead class="thead-dark">
                <tr align="center">
                    <th scope="col">No</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Alamat</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pelanggan as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}.</td>
                            <td>{{ $item->nama_pelanggan }}</td>
                            <td>{{ $item->noTelp }}</td>
                            <td>{{ $item->alamat }}</td>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Order</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        color: #333;
    }

    .container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    header {
        text-align: center;
        margin-bottom: 40px;
    }

    header h1 {
        margin: 0;
        font-size: 2.5em;
        color: #333;
    }

    .company-info {
        margin-top: 10px;
    }

    .company-info p {
        margin: 2px 0;
    }

    .order-info {
        margin-bottom: 30px;
    }

    .order-info h2 {
        border-bottom: 2px solid #333;
        padding-bottom: 5px;
        margin-bottom: 20px;
    }

    .order-info p {
        margin: 5px 0;
    }

    .order-items h2 {
        border-bottom: 2px solid #333;
        padding-bottom: 5px;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table, th, td {
        border: 1px solid #ccc;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    .text-right {
        text-align: right;
    }

    footer {
        text-align: center;
        margin-top: 20px;
    }

    @media print {
        body {
            width: 100%;
            margin: 0;
        }

        .container {
            border: none;
            box-shadow: none;
        }

        header, footer {
            page-break-after: avoid;
        }
    }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Purchase Order</h1>
            <div class="company-info">
                <p><strong>CV Manau Jaya Palembang</strong></p>
                <p>1234 Main St</p>
                <p>Anytown, USA</p>
                <p>Email: info@company.com</p>
                <p>Phone: (123) 456-7890</p>
            </div>
        </header>
        
        <section class="order-info">
            <h2>Order Details</h2>
            <p><strong>Nomor PO:</strong> {{ $pembelian->nomorpo }}</p>
            <p><strong>Tanggal PO:</strong> {{ $pembelian->tanggal }}</p>
            <p><strong>Nama Supplier:</strong> {{ $pembelian->nama_supplier }}</p>
        </section>

        <section class="order-items">
            <h2>Items</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $pembelian->nama_barang }}</td>
                            <td>{{ $pembelian->jumlah }}</td>
                            <td>Rp. {{ number_format($pembelian->satuan) }}</td>
                            <td>Rp. {{ number_format($pembelian->jumlah * $pembelian->satuan) }}</td>
                        </tr>

                    <tr>
                        <td colspan="3" class="text-right"><strong>Subtotal</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right"><strong>PPN (11%)</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right"><strong>Total</strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>

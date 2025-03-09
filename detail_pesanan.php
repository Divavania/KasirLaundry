<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f3edf9;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 550px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(111, 66, 193, 0.2);
        }

        h1 {
            text-align: center;
            color: #6f42c1;
            font-size: 22px;
            font-weight: bold;
        }

        .print-container {
            padding: 20px;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0px 2px 4px rgba(111, 66, 193, 0.15);
            border: 1px solid #ddd;
        }

        h2 {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            color: #5a32a3;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        th {
            text-align: left;
            background: #6f42c1;
            color: white;
            border-radius: 5px;
        }

        td {
            background: #f9f6fd;
            color: #333;
        }

        .footer {
            text-align: center;
            margin-top: 15px;
            font-size: 12px;
            color: #6f42c1;
            border-top: 1px dashed #6f42c1;
            padding-top: 8px;
        }

        .btn-primary {
            display: block;
            width: 100%;
            padding: 12px;
            border-radius: 25px;
            font-size: 15px;
            font-weight: bold;
            background-color: #6f42c1;
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #5a32a3;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h1 class="mb-3">Detail Pesanan</h1>

    <div id="detailPesanan" class="print-container">
        <h2>STRUK LAUNDRY</h2>
        <table>
            <tr><th>Nama:</th><td>Ahmad</td></tr>
            <tr><th>No HP:</th><td>08123456789</td></tr>
            <tr><th>Alamat:</th><td>Jl. Merdeka No. 10</td></tr>
            <tr><th>Tgl Pesanan:</th><td>01-03-2025</td></tr>
            <tr><th>Tgl Selesai:</th><td>-</td></tr>
            <tr><th>Layanan:</th><td>Cuci Kering</td></tr>
            <tr><th>Berat:</th><td>5 kg</td></tr>
            <tr><th>Total:</th><td>Rp 50.000</td></tr>
            <tr><th>Status:</th><td>Diproses</td></tr>
        </table>

        <div class="footer">
            <p>Terima kasih telah menggunakan layanan kami!</p>
        </div>
    </div>

    <div class="text-center mt-3">
        <button onclick="" class="btn btn-primary">🖨 Print Struk</button>
    </div>

</div>

</body>
</html>

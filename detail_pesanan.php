<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
            font-size: 24px;
            font-weight: bold;
        }

        .print-container {
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        th {
            text-align: left;
            background: #007bff;
            color: white;
            border-radius: 5px;
        }

        td {
            background: #f9f9f9;
        }

        .footer {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
            color: #555;
            border-top: 1px dashed black;
            padding-top: 8px;
        }

        .btn-primary {
            display: block;
            width: 100%;
            padding: 10px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #0056b3;
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
        <button onclick="printDetail()" class="btn btn-primary">Print Struk</button>
    </div>

</div>

<script>
    function printDetail() {
        var printContent = document.getElementById("detailPesanan").innerHTML;
        var newWindow = window.open('', '', 'width=200,height=600');
        newWindow.document.write('<html><head><title>Print Struk</title>');
        newWindow.document.write('<style>@media print { body { font-size: 12px; font-family: "Courier New", monospace; text-align: center; } .print-container { width: 58mm; padding: 5px; border: 1px dashed black; text-align: left; } h2 { text-align: center; font-size: 16px; font-weight: bold; margin-bottom: 5px; } table { width: 100%; border-collapse: collapse; } th, td { padding: 3px; font-size: 12px; } .footer { text-align: center; margin-top: 10px; font-size: 12px; border-top: 1px dashed black; padding-top: 5px; } }</style>');
        newWindow.document.write('</head><body>');
        newWindow.document.write('<div class="print-container">' + printContent + '</div>');
        newWindow.document.write('</body></html>');
        newWindow.document.close();
        newWindow.print();
    }
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f3edf9;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background: linear-gradient(to right, #7B1FA2, #AE52D4);
            padding: 15px;
            color: white;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar .nav-links a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            transition: 0.3s;
        }

        .navbar .nav-links a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(111, 66, 193, 0.2);
        }

        h3 {
            text-align: center;
            color: #6f42c1;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #d1c4e9;
            padding: 10px;
            font-size: 14px;
        }

        .btn-primary {
            display: block;
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            background-color: #6f42c1;
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #5a32a3;
        }

        .btn-secondary {
            display: block;
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            background-color: #d1c4e9;
            border: none;
            color: #4a2b8b;
            text-align: center;
            text-decoration: none;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-secondary:hover {
            background: #b8a4d6;
            color: #351f6e;
        }

    </style>
</head>
<body>

    <nav class="navbar">
        <span>KASIR LAUNDRY</span>
        <div class="nav-links">
            <a href="index.php">Beranda</a>
            <a href="daftar_pelanggan.php">Daftar Pelanggan</a>
            <a href="daftar_layanan.php">Daftar Layanan</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h3>Tambah Pesanan</h3>

        <form action="tambah_pesanan.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Nama Pelanggan:</label>
                <select name="pelanggan_id" class="form-control" required>
                    <option value="">Pilih Pelanggan</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Layanan:</label>
                <select name="layanan_id" class="form-control" required>
                    <option value="">Pilih Layanan</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Berat (kg):</label>
                <input type="number" name="berat" class="form-control" required>
            </div>

            <button type="submit" class="btn-primary">✔ Simpan Pesanan</button>
            <a href="index.php" class="btn-secondary">🏠 Kembali ke Beranda</a>
        </form>
    </div>

</body>
</html>
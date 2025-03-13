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
            background-color:rgb(196, 202, 209);
        }

        .navbar {
        background:  #9250F1 ;
        padding: 15px;
        color: white;
        font-weight: bold;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav .nav-link:hover {
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

<nav class="navbar navbar-expand-lg">
<a class="navbar-brand text-white" href="index.php">
        <img src="kasir.png" alt="Logo Laundry" width="50" height="50" class="me-2">
        KASIR LAUNDRY
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-white" href="index.php">Beranda</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="daftar_pelanggan.php">Daftar Pelanggan</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="daftar_layanan.php">Daftar Layanan</a></li>
            </ul>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
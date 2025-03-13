<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Layanan</title>
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

        .btn-success {
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

        .btn-success:hover {
            background: #5a32a3;
        }

        .btn-back {
            margin-bottom: 20px;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back:hover {
            background: #c82333;
        }

        .table {
            margin-top: 20px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 2px 6px rgba(111, 66, 193, 0.15);
        }

        .table th {
            background: #6f42c1;
            color: white;
            text-align: center;
            font-weight: bold;
        }

        .table td {
            text-align: center;
            background: #f9f6fd;
        }

        .table tbody tr:nth-child(even) {
            background-color: #eee6f9;
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
    <!-- Tombol kembali ke index -->
    <a href="index.php" class="btn-back">← Kembali ke Halaman Utama</a>

    <div class="container mt-4">
        <h3>Tambah Layanan</h3>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama_layanan" class="form-label">Nama Layanan:</label>
                <input type="text" name="nama_layanan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga per kg:</label>
                <input type="number" name="harga" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">✔ Simpan Layanan</button>
        </form>

        <h3 class="mt-4">Daftar Layanan</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Layanan</th>
                    <th>Harga per kg</th>
                </tr>
            </thead>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

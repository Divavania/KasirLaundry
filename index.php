<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Laundry</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<style>
    body {
        background:rgb(196, 202, 209);
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

    
    .header-container {
        display: flex;
        justify-content: space-between;
        margin: 20px auto;
        padding-bottom: 10px;
        border-bottom: 2px solid #ccc;
    }
    .header-container h3 {
        margin: 0;
        align-items: center;
    }
    .header-container .btn-custom {
        margin-left: 15px;
        background-color: #9250F1;
        color: white;
    }
    .table-container {
        overflow-x: auto;
    }
    .table thead th{
        background-color: #9250F1;
        color: white;
    }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
        <a class="navbar-brand text-white">KASIR LAUNDRY</a>
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

<div class="container">
<div class="header-container">
    <h3>Selamat Datang | Beranda</h3>
    <a href="tambah_pesanan.php" class="btn btn-custom">+ Order Baru</a>
</div>
<div class="dashboard-container">
    <div class="row justify-content-center g-3">
        <div class="col-md-3">
            <div class="p-3 bg-light rounded shadow-sm">
                <h5>Total Order</h5>
                <p><strong>0</strong></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 bg-light rounded shadow-sm">
                <h5>Status Selesai</h5>
                <p><strong>0</strong></p>
            </div>
        </div>
    </div>

    <hr>

    <h3>Daftar Pesanan</h3>
    <div class="table-container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Layanan</th>
                <th>Berat</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Tanggal Pesanan</th>
                <th>Tanggal Selesai</th>
                <th>Tanggal Diambil</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Ahmad</td>
            <td>08123456789</td>
            <td>Jl. Merdeka No. 10</td>
            <td>Cuci Kering</td>
            <td>5 kg</td>
            <td>Rp 50.000</td>
            <td>Diproses</td>
            <td>01-03-2025</td>
            <td>Belum selesai</td>
            <td>Belum diambil</td>
            <td>
                <a href="detail_pesanan.php?id=1" class="btn btn-info btn-sm">Detail</a>
                <form action="ubah_status.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="1">
                    <select name="status" class="form-control d-inline w-auto">
                        <option value="Diproses" selected>Diproses</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Diambil">Diambil</option>
                    </select>
                    <button type="submit" class="btn btn-warning btn-sm">Ubah</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Budi</td>
            <td>08987654321</td>
            <td>Jl. Sudirman No. 20</td>
            <td>Cuci Setrika</td>
            <td>3 kg</td>
            <td>Rp 35.000</td>
            <td>Selesai</td>
            <td>28-02-2025</td>
            <td>01-03-2025</td>
            <td>Belum diambil</td>
            <td>
                <a href="detail_pesanan.php?id=2" class="btn btn-info btn-sm">Detail</a>
                <form action="ubah_status.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="2">
                    <select name="status" class="form-control d-inline w-auto">
                        <option value="Diproses">Diproses</option>
                        <option value="Selesai" selected>Selesai</option>
                        <option value="Diambil">Diambil</option>
                    </select>
                    <button type="submit" class="btn btn-warning btn-sm">Ubah</button>
                </form>
            </td>
        </tr>
    </tbody>

    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
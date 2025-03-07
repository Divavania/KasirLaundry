<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
    .navbar {
        background: linear-gradient(to bottom, #9250F1 59%, #FF80FF);
        padding: 15px;
        color: white;
        font-weight: bold;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
    .navbar .nav-links {
        display: flex;
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
    </style>
<nav class="navbar" >
        <span>KASIR LAUNDRY</span>
    <div class="nav-links">
        <a href="index.php">Beranda</a>
        <a href="daftar_pelanggan.php">Daftar Pelanggan</a>
        <a href="daftar_layanan.php">Daftar Layanan</a>
    </div>
</nav>    
    
<h3>Tambah Pesanan</h3>
<a href="index.php" class="btn btn-secondary mb-3">Kembali</a>

<form action="tambah_pesanan.php" method="POST">
    <div class="mb-3">
        <label for="pelanggan" class="form-label">Nama Pelanggan:</label>
        <select name="pelanggan_id" class="form-control" required>
            <option value="">Pilih Pelanggan</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="layanan" class="form-label">Layanan:</label>
        <select name="layanan_id" class="form-control" required>
            <option value="">Pilih Layanan</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Berat (kg):</label>
        <input type="number" name="berat" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan Pesanan</button>
</form>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Laundry</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h1 class="mb-3">Kasir Laundry</h1>
    
    <a href="daftar_pelanggan.php" class="btn btn-primary">Daftar Pelanggan</a>
    <a href="daftar_layanan.php" class="btn btn-primary">Daftar Layanan</a>

    <hr>
    
    <h3>Tambah Pesanan</h3>
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

    <hr>

    <h3>Daftar Pesanan</h3>
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

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Pelanggan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h3>Tambah Pelanggan</h3>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pelanggan:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP:</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat:</label>
            <textarea name="alamat" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan Pelanggan</button>
    </form>

    <h3 class="mt-4">Daftar Pelanggan</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Nomor HP</th>
                <th>Alamat</th>
            </tr>
        </thead>
    </table>
</div>
</body>
</html>
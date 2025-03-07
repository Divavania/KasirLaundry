<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Layanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
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
        <button type="submit" class="btn btn-success">Simpan Layanan</button>
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
    </table>
</div>
</body>
</html>
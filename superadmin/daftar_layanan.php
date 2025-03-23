<?php
include '../koneksi.php';
include '../navbar.php';

// Simpan data layanan ke database
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['update'])) {
    $nama_layanan = $conn->real_escape_string($_POST['nama_layanan']);
    $harga = intval($_POST['harga_per_kg']);

    $stmt = $conn->prepare("INSERT INTO layanan (nama_layanan, harga_per_kg) VALUES (?, ?)");
    $stmt->bind_param("si", $nama_layanan, $harga);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "<p>Gagal menambahkan layanan: " . $conn->error . "</p>";
    }
    $stmt->close();
}

// Hapus layanan dari database
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    $stmt = $conn->prepare("DELETE FROM layanan WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Update layanan di database
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $nama_layanan = $conn->real_escape_string($_POST['nama_layanan']);
    $harga = intval($_POST['harga_per_kg']);

    $stmt = $conn->prepare("UPDATE layanan SET nama_layanan = ?, harga_per_kg = ? WHERE id = ?");
    $stmt->bind_param("sii", $nama_layanan, $harga, $id);
    $stmt->execute();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Ambil data layanan dari database
$result = $conn->query("SELECT * FROM layanan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Layanan</title>
    <script>
        function editLayanan(id, nama, harga) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_nama_layanan').value = nama;
            document.getElementById('edit_harga').value = harga;
            document.getElementById('editPopup').style.display = 'block';
        }

        function tutupPopup() {
            document.getElementById('editPopup').style.display = 'none';
        }

        window.onclick = function(event) {
            var modal = document.getElementById('editPopup');
            if (event.target == modal) {
                tutupPopup();
            }
        }
    </script>
</head>
<body>
    <h3>Tambah Layanan</h3>
    <form action="" method="POST">
        <label for="nama_layanan">Nama Layanan:</label>
        <input type="text" name="nama_layanan" required><br>

        <label for="harga">Harga per kg:</label>
        <input type="number" name="harga_per_kg" required><br>

        <button type="submit">Simpan Layanan</button>
    </form>

    <h3>Daftar Layanan</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Layanan</th>
                <th>Harga per kg</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['nama_layanan']); ?></td>
                        <td>Rp <?= number_format($row['harga_per_kg'], 0, ',', '.'); ?></td>
                        <td>
                            <a href="?hapus=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            <button onclick="editLayanan('<?= $row['id']; ?>', '<?= htmlspecialchars($row['nama_layanan']); ?>', '<?= $row['harga_per_kg']; ?>')">Edit</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="4">Belum ada layanan.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Popup Edit Layanan -->
    <div id="editPopup" style="display:none; position:fixed; top:20%; left:30%; background:#fff; padding:20px; border:1px solid #000;">
        <h3>Edit Layanan</h3>
        <form action="" method="POST">
            <input type="hidden" name="update" value="1">
            <input type="hidden" id="edit_id" name="id">

            <label for="edit_nama_layanan">Nama Layanan:</label>
            <input type="text" id="edit_nama_layanan" name="nama_layanan" required><br>

            <label for="edit_harga">Harga per kg:</label>
            <input type="number" id="edit_harga" name="harga_per_kg" required><br>

            <button type="submit">Simpan Perubahan</button>
            <button type="button" onclick="tutupPopup()">Batal</button>
        </form>
    </div>
</body>
</html>
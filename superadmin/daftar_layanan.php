<?php
include '../koneksi.php';

// Simpan data layanan ke database
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['update'])) {
    $nama_layanan = $_POST['nama_layanan'];
    $harga = $_POST['harga_per_kg'];

    $stmt = $conn->prepare("INSERT INTO layanan (nama_layanan, harga_per_kg) VALUES (?, ?)");
    $stmt->bind_param("si", $nama_layanan, $harga);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['PHP_SELF']); // Redirect untuk mencegah pengulangan
        exit;
    } else {
        echo "<p>Gagal menambahkan layanan: " . $conn->error . "</p>";
    }
    $stmt->close();
}

// Hapus layanan dari database
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $stmt = $conn->prepare("DELETE FROM layanan WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Update layanan di database
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_layanan = $_POST['nama_layanan'];
    $harga = $_POST['harga_per_kg'];

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
            <?php
            if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama_layanan']) . "</td>";
                    echo "<td>Rp " . number_format($row['harga_per_kg'], 0, ',', '.') . "</td>";
                    echo "<td>
                        <a href='?hapus=" . $row['id'] . "' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                        <button onclick='openModal(" . $row['id'] . ", \"" . htmlspecialchars($row['nama_layanan']) . "\", " . $row['harga_per_kg'] . ")'>Edit</button>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Belum ada layanan.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <!-- Modal Popup untuk Edit Layanan -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>Edit Layanan</h3>
            <form action="" method="POST">
                <input type="hidden" id="edit_id" name="id">
                <label for="edit_nama_layanan">Nama Layanan:</label>
                <input type="text" id="edit_nama_layanan" name="nama_layanan" required><br>

                <label for="edit_harga">Harga per kg:</label>
                <input type="number" id="edit_harga" name="harga_per_kg" required><br>

                <button type="submit" name="update">Simpan Perubahan</button>
            </form>
        </div>
    </div>

    <script>
        // Fungsi untuk membuka modal dan mengisi data
        function openModal(id, nama, harga) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_nama_layanan').value = nama;
            document.getElementById('edit_harga').value = harga;
            document.getElementById('editModal').style.display = 'block';
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        // Menutup modal jika klik di luar modal
        window.onclick = function(event) {
            var modal = document.getElementById('editModal');
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>
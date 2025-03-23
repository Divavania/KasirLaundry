<?php
include '../koneksi.php';
include '../navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['aksi'])) {
    $aksi = $_POST['aksi'];

    if ($aksi == 'tambah') {
        $nama = $conn->real_escape_string($_POST['nama']);
        $no_hp = $conn->real_escape_string($_POST['no_hp']);
        $alamat = $conn->real_escape_string($_POST['alamat']);

        $sql = "INSERT INTO pelanggan (nama, no_hp, alamat) VALUES ('$nama', '$no_hp', '$alamat')";

        if ($conn->query($sql) === TRUE) {
            echo "Pelanggan berhasil ditambahkan.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($aksi == 'hapus') {
        $id = intval($_POST['id']);
        $conn->query("DELETE FROM pelanggan WHERE id = $id");
    } elseif ($aksi == 'edit') {
        $id = intval($_POST['id']);
        $nama = $conn->real_escape_string($_POST['nama']);
        $no_hp = $conn->real_escape_string($_POST['no_hp']);
        $alamat = $conn->real_escape_string($_POST['alamat']);

        $conn->query("UPDATE pelanggan SET nama = '$nama', no_hp = '$no_hp', alamat = '$alamat' WHERE id = $id");
    }
}

$result = $conn->query("SELECT * FROM pelanggan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pelanggan</title>
    <script>
        function editPelanggan(id, nama, no_hp, alamat) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_no_hp').value = no_hp;
            document.getElementById('edit_alamat').value = alamat;
            document.getElementById('editPopup').style.display = 'block';
        }

        function tutupPopup() {
            document.getElementById('editPopup').style.display = 'none';
        }
    </script>
</head>
<body>
    <h3>Tambah Pelanggan</h3>
    <form action="" method="POST">
        <input type="hidden" name="aksi" value="tambah">
        <label>Nama Pelanggan:</label>
        <input type="text" name="nama" required><br>

        <label>Nomor HP:</label>
        <input type="text" name="no_hp" required><br>

        <label>Alamat:</label>
        <textarea name="alamat" rows="3" required></textarea><br>

        <button type="submit">Simpan Pelanggan</button>
    </form>

    <h3>Daftar Pelanggan</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Nomor HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td><?= htmlspecialchars($row['no_hp']); ?></td>
                        <td><?= htmlspecialchars($row['alamat']); ?></td>
                        <td>
                            <form action="" method="POST" style="display:inline;">
                                <input type="hidden" name="aksi" value="hapus">
                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                <button type="submit">Hapus</button>
                            </form>
                            <button onclick="editPelanggan('<?= $row['id']; ?>', '<?= htmlspecialchars($row['nama']); ?>', '<?= htmlspecialchars($row['no_hp']); ?>', '<?= htmlspecialchars($row['alamat']); ?>')">Edit</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5">Belum ada pelanggan.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div id="editPopup" style="display:none; position:fixed; top:20%; left:30%; background:#fff; padding:20px; border:1px solid #000;">
        <h3>Edit Pelanggan</h3>
        <form action="" method="POST">
            <input type="hidden" name="aksi" value="edit">
            <input type="hidden" name="id" id="edit_id">

            <label>Nama Pelanggan:</label>
            <input type="text" name="nama" id="edit_nama" required><br>

            <label>Nomor HP:</label>
            <input type="text" name="no_hp" id="edit_no_hp" required><br>

            <label>Alamat:</label>
            <textarea name="alamat" id="edit_alamat" rows="3" required></textarea><br>

            <button type="submit">Simpan Perubahan</button>
            <button type="button" onclick="tutupPopup()">Batal</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
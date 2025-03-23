<?php
session_start();
require '../koneksi.php';

// Hanya superadmin yang boleh mengakses
if ($_SESSION['role'] != 'superadmin') {
    header("Location: ../index.php");
    exit();
}

// Tambah Admin Baru
if (isset($_POST['tambah'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // Bisa pakai password_hash()
    $role = $_POST['role'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO users (username, password, role, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password, $role, $status);
    $stmt->execute();
    header("Location: manajemen_admin.php");
}

// Ubah Status Admin
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE users SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    header("Location: manajemen_admin.php");
}

// Hapus Admin
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: manajemen_admin.php");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Manajemen Admin</title>
</head>

<body>
    <h2>Manajemen Admin</h2>

    <!-- Form Tambah Admin -->
    <h3>Tambah Admin</h3>
    <form method="POST">
        <label>Username: <input type="text" name="username" required></label><br>
        <label>Password: <input type="password" name="password" required></label><br>
        <label>Role:
            <select name="role">
                <option value="admin">Admin</option>
                <option value="superadmin">Superadmin</option>
            </select>
        </label><br>
        <label>Status:
            <select name="status">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </label><br>
        <button type="submit" name="tambah">Tambah Admin</button>
    </form>

    <!-- Daftar Admin -->
    <h3>Daftar Admin</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM users");
        while ($row = $result->fetch_assoc()) :
        ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['role'] ?></td>
                <td><?= $row['status'] ?></td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <select name="status">
                            <option value="aktif" <?= $row['status'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                            <option value="nonaktif" <?= $row['status'] == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                        </select>
                        <button type="submit" name="update">Update</button>
                    </form>

                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" name="hapus" onclick="return confirm('Hapus admin ini?');">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>

</html>
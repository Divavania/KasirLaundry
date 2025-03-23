<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$role = $_SESSION['role'] ?? '';
?>

<nav>
    <a href="#">KASIR LAUNDRY</a> |

    <?php if ($role === 'superadmin') : ?>
        <a href="../superadmin/dashboard.php">Dashboard</a> |
        <a href="../superadmin/daftar_pelanggan.php">Kelola Pelanggan</a> |
        <a href="../superadmin/daftar_layanan.php">Kelola Layanan</a> |
        <a href="../superadmin/manajemen_admin.php">Kelola Admin</a> |
    <?php elseif ($role === 'admin') : ?>
        <a href="../admin/dashboard.php">Dashboard</a> |
        <a href="../admin/daftar_pelanggan.php">Kelola Pelanggan</a> |
    <?php endif; ?>

    <a href="../logout.php" style="color: red;">Logout</a>
</nav>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah pengguna sudah login dan memiliki role
$role = $_SESSION['role'] ?? ''; 
?>

<nav>
    <span>KASIR LAUNDRY</span>
    <?php if ($role === 'superadmin') : ?>
        <a href="../superadmin/dashboard.php">Dashboard</a>
        <a href="../superadmin/daftar_pelanggan.php">Kelola Pelanggan</a>
        <a href="../superadmin/daftar_layanan.php">Kelola Layanan</a>
    <?php elseif ($role === 'admin') : ?>
        <a href="../admin/dashboard.php">Dashboard</a>
        <a href="../admin/daftar_pelanggan.php">Kelola Pelanggan</a>
    <?php endif; ?>
    <a href="../logout.php">Logout</a>
</nav>
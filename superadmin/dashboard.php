<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../navbar.php';
require '../koneksi.php';

?>

<h3>Dashboard Super Admin - Laundry</h3>
<a href="tambah_pesanan.php">+ Order Baru</a>
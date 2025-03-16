<?php
session_start();
require 'includes/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'superadmin') {
            header("Location: superadmin/dashboard.php");
        } elseif ($user['role'] == 'admin') {
            header("Location: admin/dashboard.php");
        }
        exit();
    } else {
        echo "Login gagal. Periksa kembali username dan password!";
    }
}
?>
<?php
session_start();
require 'includes/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Validasi password & status aktif
        if (password_verify($password, $user['password'])) {
            if ($user['status'] == 'aktif') {
                // Simpan sesi login
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Arahkan ke dashboard berdasarkan role
                if ($user['role'] == 'superadmin') {
                    header("Location: superadmin/dashboard.php");
                } elseif ($user['role'] == 'admin') {
                    header("Location: admin/dashboard.php");
                }
                exit();
            } else {
                echo "Akun Anda tidak aktif. Hubungi superadmin!";
            }
        } else {
            echo "Password salah. Periksa kembali!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }

    $stmt->close();
    $conn->close();
}
?>
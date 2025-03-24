<?php
session_start();
require 'includes/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $error = "";

    // Validasi input tidak kosong
    if (empty($username) || empty($password)) {
        $error = "Username dan password wajib diisi!";
    } else {
        // Gunakan prepared statement untuk keamanan
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            // Validasi password dan status aktif
            if (password_verify($password, $user['password'])) {
                if ($user['status'] == 'aktif') {
                    // Simpan sesi login
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role'];

                    // Arahkan ke dashboard berdasarkan role
                    if ($user['role'] == 'superadmin') {
                        header("Location: superadmin/dashboard.php");
                        exit();
                    } elseif ($user['role'] == 'admin') {
                        header("Location: admin/dashboard.php");
                        exit();
                    }
                } else {
                    $error = "Akun Anda tidak aktif. Hubungi superadmin!";
                }
            } else {
                $error = "Password salah. Periksa kembali!";
            }
        } else {
            $error = "Username tidak ditemukan!";
        }

        $stmt->close();
    }

    $conn->close();
    
    // Jika ada error, simpan di session dan redirect ke login
    if (!empty($error)) {
        $_SESSION['error'] = $error;
        header("Location: index.php");
        exit();
    }
}
?>
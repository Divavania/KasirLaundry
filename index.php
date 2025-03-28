<?php
session_start();

// Data user (simulasi dari database)
$users = [
    'admin' => [
        'password' => password_hash('admin123', PASSWORD_DEFAULT),
        'role' => 'admin',
        'status' => 'aktif'
    ],
    'superadmin' => [
        'password' => password_hash('super123', PASSWORD_DEFAULT),
        'role' => 'superadmin',
        'status' => 'aktif'
    ],
    'user_nonaktif' => [
        'password' => password_hash('user123', PASSWORD_DEFAULT),
        'role' => 'admin',
        'status' => 'nonaktif'
    ]
];

// Validasi form login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim(htmlspecialchars($_POST['username']));
    $password = $_POST['password'];

    // Validasi input tidak boleh kosong
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username dan password wajib diisi!";
        header('Location: index.php');
        exit();
    }

    // Validasi username
    if (isset($users[$username])) {
        $user = $users[$username];

        // Cek password dan status aktif
        if (password_verify($password, $user['password'])) {
            if ($user['status'] == 'aktif') {
                // Set sesi pengguna
                $_SESSION['user'] = $username;
                $_SESSION['role'] = $user['role'];

                // Arahkan berdasarkan peran (role)
                if ($_SESSION['role'] == 'admin') {
                    header('Location: admin/dashboard.php');
                    exit();
                } elseif ($_SESSION['role'] == 'superadmin') {
                    header('Location: superadmin/dashboard.php');
                    exit();
                }
            } else {
                $_SESSION['error'] = "Akun Anda tidak aktif. Hubungi superadmin!";
            }
        } else {
            $_SESSION['error'] = "Password salah!";
        }
    } else {
        $_SESSION['error'] = "Username tidak ditemukan!";
    }
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h2>Form Login</h2>

    <!-- Menampilkan pesan error -->
    <?php if (isset($_SESSION['error'])): ?>
        <p style="color: red;"><?php echo htmlspecialchars($_SESSION['error']); ?></p>
        <?php unset($_SESSION['error']); // Hapus pesan error setelah ditampilkan ?>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>

</html>
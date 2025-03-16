<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // kredensial (Ganti dengan autentikasi dari database)
    $users = [
        'admin' => ['password' => 'admin123', 'role' => 'admin'],
        'superadmin' => ['password' => 'super123', 'role' => 'superadmin'],
    ];

    if (isset($users[$username]) && $users[$username]['password'] == $password) {
        $_SESSION['user'] = $username;
        $_SESSION['role'] = $users[$username]['role'];

        if ($_SESSION['role'] == 'admin') {
            header('Location: admin/dashboard.php');
            exit();
        } elseif ($_SESSION['role'] == 'superadmin') {
            header('Location: superadmin/dashboard.php');
            exit();
        }
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login</title>
</head>
<body>
    <h2>Form Login</h2>
    <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>

    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
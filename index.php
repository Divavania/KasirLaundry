<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h2>Form Login</h2>
    <?php if (!empty($error)): ?>
        <p><?php echo htmlspecialchars($error); ?></p>
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

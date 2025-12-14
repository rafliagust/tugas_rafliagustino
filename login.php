<?php
session_start();
require_once 'logic.php';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $user = loginUser($email, $pass);

    if ($user) {
        $_SESSION['user_name'] = $user['name'];
        header('Location: index.php');
        exit;
    } else {
        $msg = "Email atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login Area</title></head>
<body>
    <h3>Login Area</h3>
    <?php if($msg): ?>
        <p style="color:red;"><?= $msg ?></p>
    <?php endif; ?>
    
    <form method="POST">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Masuk</button>
    </form>
    <br>
    <a href="register.php">Buat Akun Baru</a>
</body>
</html>
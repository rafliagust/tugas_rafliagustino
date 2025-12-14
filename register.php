<?php
require_once 'logic.php';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $result = registerUser($name, $email, $pass);

    if ($result === true) {
        header('Location: login.php');
        exit;
    } else {
        $msg = $result;
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Daftar Akun</title></head>
<body>
    <h3>Form Registrasi</h3>
    <?php if($msg): ?>
        <p style="color:red;"><?= $msg ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Nama Lengkap:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Alamat Email:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Daftar Sekarang</button>
    </form>
    <br>
    <a href="login.php">Sudah punya akun? Login</a>
</body>
</html>
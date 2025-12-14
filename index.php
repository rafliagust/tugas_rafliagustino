<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Beranda</title></head>
<body>
    <h1>Selamat Datang, <?= $_SESSION['user_name']; ?>!</h1>
    <p>Anda berhasil login menggunakan Email.</p>
    <a href="logout.php">Keluar</a>
</body>
</html>
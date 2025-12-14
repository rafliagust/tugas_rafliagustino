<?php
define('DB_FILE', 'database.json');

function getAllUsers() {
    if (!file_exists(DB_FILE)) return [];
    $data = file_get_contents(DB_FILE);
    return json_decode($data, true) ?? [];
}

function saveUsers($data) {
    file_put_contents(DB_FILE, json_encode($data, JSON_PRETTY_PRINT));
}

// REGISTER: Pakai Nama, Email, Password
function registerUser($name, $email, $password) {
    $users = getAllUsers();
    
    // Validasi 1: Cek Email sudah ada belum
    foreach ($users as $user) {
        if ($user['email'] === $email) {
            return "Email sudah terdaftar!";
        }
    }

    // Validasi 2: Password min 6
    if (strlen($password) < 6) {
        return "Password minimal 6 karakter!";
    }

    $newUser = [
        'name' => $name,
        'email' => $email,
        'password' => $password
    ];
    
    $users[] = $newUser;
    saveUsers($users);
    return true;
}

// LOGIN: Pakai Email & Password
function loginUser($email, $password) {
    $users = getAllUsers();
    foreach ($users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            return $user; // Return data usernya (biar bisa ambil nama)
        }
    }
    return false;
}
?>
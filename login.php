<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM loginin WHERE username='$username' AND password='$password'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        // Login berhasil, atur session dan arahkan ke halaman index
        $_SESSION['username'] = $username;
        header('Location: index.php');
    } else {
        // Login gagal, mungkin tampilkan pesan kesalahan
        echo "Login Gagal. Periksa kembali username dan password.";
    }
}
?>

<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style1.css" />
</head>

<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <input type="submit" value="Login">
    </form>
</body>

</html>
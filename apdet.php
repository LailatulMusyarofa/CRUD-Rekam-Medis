<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $id";
    $result = $koneksi->query($query);
    $user = $result->fetch_assoc();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $keluhan = $_POST['keluhan'];
    $ruangTindakan = $_POST['ruangTindakan'];

    $query = "UPDATE users SET 
              nama='$nama', email='$email', keluhan='$keluhan', ruangTindakan='$ruangTindakan' 
              WHERE id=$id";
    $koneksi->query($query);

    header('Location: index.php');
}
?>

<html>

<head>
    <title>Edit Pengguna</title>
</head>

<body>
    <h2>Edit Pengguna</h2>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?= $user['id']; ?>">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?= $user['nama']; ?>" required>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= $user['email']; ?>" required>
        <label for="nama">Keluhan:</label>
        <input type="text" name="keluhan" value="<?= $user['keluhan']; ?>" required>
        <label for="nama">Ruang Tindakan:</label>
        <input type="text" name="ruangTindakan" value="<?= $user['ruangTindakan']; ?>" required>
        <input type="submit" value="Simpan">
    </form>
</body>

</html>
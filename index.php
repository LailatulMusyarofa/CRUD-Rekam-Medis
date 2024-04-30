<?php
include 'koneksi.php';

// Pengecekan session
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$query = "SELECT * FROM users";
$result = $koneksi->query($query);
?>

<html>

<head>
    <title>Aplikasi CRUD PHP</title>
    <link rel="stylesheet" href="style2.css" />
</head>

<body>
    <h2>Selamat datang, <?= $_SESSION['username']; ?>!</h2>
    
    <h2>Rekam Medis</h2>
    <h2>Rumah Sakit Trisna Medika</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Pasien</th>
            <th>Email</th>
            <th>Keluhan</th>
            <th>Ruang Tindakan</th>
            <th>Aksi</th>
            
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['keluhan']; ?></td>
                <td><?= $row['ruangTindakan']; ?></td>
                <td>
                    <a href="apdet.php?id=<?= $row['id']; ?>">Edit</a>
                    <a href="hapus.php?id=<?= $row['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Tambah Pengguna</h2>
    <form action="tambah.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="nama">Keluhan:</label>
        <input type="text" name="keluhan" required>
        <label for="nama">Ruang Tindakan:</label>
        <input type="text" name="ruangTindakan" required>
        <input type="submit" value="Tambah">
    </form>
    <a href="logout.php">Logout</a>
</body>

</html>
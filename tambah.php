<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $keluhan = $_POST['keluhan'];
    $ruangTindakan = $_POST['ruangTindakan'];

    $query = "INSERT INTO users (nama, email, Keluhan, ruangTindakan) 
              VALUES ('$nama', '$email','$keluhan','$ruangTindakan')";
    $koneksi->query($query);
}

header('Location: index.php');

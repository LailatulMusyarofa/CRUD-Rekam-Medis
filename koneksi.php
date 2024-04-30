<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "web_nih";

$koneksi = new mysqli($host, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}

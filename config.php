<?php
$host = 'localhost'; // Sesuaikan dengan host database Anda
$dbname = 'puskesmas'; // Nama database
$username = 'root'; // Nama user database
$password = ''; // Password database (kosong jika tidak ada)

// Membuat koneksi
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set error mode ke exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>

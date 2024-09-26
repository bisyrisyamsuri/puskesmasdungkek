<?php
// Memasukkan file config.php untuk koneksi database
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $id_register = $_POST['id_register'];
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $poli = $_POST['poli'];

    // SQL untuk memasukkan data ke tabel pasien
    $sql = "INSERT INTO pasien (id_register, nama, nik, tgl_lahir, jk, alamat, no_hp, poli) 
            VALUES (:id_register, :nama, :nik, :tgl_lahir, :jk, :alamat, :no_hp, :poli)";
    
    // Menyiapkan dan mengeksekusi query
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':id_register' => $id_register,
            ':nama' => $nama,
            ':nik' => $nik,
            ':tgl_lahir' => $tgl_lahir,
            ':jk' => $jk,
            ':alamat' => $alamat,
            ':no_hp' => $no_hp,
            ':poli' => $poli,
        ]);

        // Redirect atau tampilkan pesan sukses
        echo "<script>alert('Registrasi berhasil!'); window.location.href = 'register.php';</script>";
    } catch (PDOException $e) {
        // Jika ada error, tampilkan pesan error
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Metode pengiriman tidak valid.";
}
?>

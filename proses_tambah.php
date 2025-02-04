<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Upload foto
        $foto = $_FILES['foto'];
        $nama_foto = time() . '_' . $foto['name'];
        $target_dir = "uploads/";
        move_uploaded_file($foto['tmp_name'], $target_dir . $nama_foto);

        // Insert data
        $stmt = $conn->prepare("INSERT INTO pelanggan (nama, telepon, alamat, foto) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $_POST['nama'],
            $_POST['telepon'],
            $_POST['alamat'],
            $nama_foto
        ]);

        header("Location: list.php?status=success&message=Data berhasil ditambahkan");
    } catch(PDOException $e) {
        header("Location: tambah.php?status=error&message=" . $e->getMessage());
    }
} 
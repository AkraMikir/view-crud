<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $id = $_POST['id'];
        $foto_lama = $_POST['foto_lama'];
        
        // Jika ada upload foto baru
        if (!empty($_FILES['foto']['name'])) {
            $foto = $_FILES['foto'];
            $nama_foto = time() . '_' . $foto['name'];
            $target_dir = "uploads/";
            move_uploaded_file($foto['tmp_name'], $target_dir . $nama_foto);
            
            // Hapus foto lama
            if (file_exists($target_dir . $foto_lama)) {
                unlink($target_dir . $foto_lama);
            }
        } else {
            $nama_foto = $foto_lama;
        }

        // Update data
        $stmt = $conn->prepare("UPDATE pelanggan SET nama = ?, telepon = ?, alamat = ?, foto = ? WHERE id = ?");
        $stmt->execute([
            $_POST['nama'],
            $_POST['telepon'],
            $_POST['alamat'],
            $nama_foto,
            $id
        ]);

        header("Location: list.php?status=success&message=Data berhasil diupdate");
    } catch(PDOException $e) {
        header("Location: edit.php?id=$id&status=error&message=" . $e->getMessage());
    }
} 
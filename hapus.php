<?php
require_once 'koneksi.php';

if (isset($_GET['id'])) {
    try {
        $id = $_GET['id'];

        // Ambil nama foto
        $stmt = $conn->prepare("SELECT foto FROM pelanggan WHERE id = ?");
        $stmt->execute([$id]);
        $pelanggan = $stmt->fetch();

        // Hapus foto dari direktori
        if ($pelanggan['foto']) {
            $target_dir = "uploads/";
            if (file_exists($target_dir . $pelanggan['foto'])) {
                unlink($target_dir . $pelanggan['foto']);
            }
        }

        // Hapus data dari database
        $stmt = $conn->prepare("DELETE FROM pelanggan WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: list.php?status=success&message=Data berhasil dihapus");
    } catch(PDOException $e) {
        header("Location: list.php?status=error&message=" . $e->getMessage());
    }
} 
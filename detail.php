<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pelanggan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-gray-800 rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold text-center text-blue-400 mb-8">Detail Pelanggan</h1>

            <?php
            require_once 'koneksi.php';

            if (isset($_GET['id'])) {
                $stmt = $conn->prepare("SELECT * FROM pelanggan WHERE id = ?");
                $stmt->execute([$_GET['id']]);
                $pelanggan = $stmt->fetch();

                if (!$pelanggan) {
                    header("Location: list.php?status=error&message=Data tidak ditemukan");
                    exit;
                }
            }
            ?>

            <div class="flex flex-col items-center mb-6">
                <img src="uploads/<?= $pelanggan['foto'] ?>" alt="Foto Pelanggan" class="w-32 h-32 object-cover rounded-full mb-4">
            </div>

            <div class="space-y-4">
                <div class="text-center">
                    <p class="text-blue-400 font-semibold">ID Pelanggan:</p>
                    <p class="text-gray-300"><?= $pelanggan['id'] ?></p>
                </div>
                
                <div class="text-center">
                    <p class="text-blue-400 font-semibold">Nama Pelanggan:</p>
                    <p class="text-gray-300"><?= $pelanggan['nama'] ?></p>
                </div>

                <div class="text-center">
                    <p class="text-blue-400 font-semibold">No Telepon:</p>
                    <p class="text-gray-300"><?= $pelanggan['telepon'] ?></p>
                </div>

                <div class="text-center">
                    <p class="text-blue-400 font-semibold">Alamat:</p>
                    <p class="text-gray-300"><?= $pelanggan['alamat'] ?></p>
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="list.php" class="text-blue-400 hover:underline">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>

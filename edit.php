<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Pelanggan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold mb-8">Ubah Data Pelanggan</h1>

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

            <form action="proses_edit.php" method="POST" enctype="multipart/form-data" class="space-y-6">
                <input type="hidden" name="id" value="<?= $pelanggan['id'] ?>">
                
                <div>
                    <label class="block text-gray-700 mb-2" for="id">ID Pelanggan</label>
                    <input type="text" value="<?= $pelanggan['id'] ?>" class="w-full px-4 py-2 border rounded-lg bg-gray-100" readonly>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2" for="nama">Nama Pelanggan</label>
                    <input type="text" id="nama" name="nama" value="<?= $pelanggan['nama'] ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 mb-2" for="telepon">No Telepon</label>
                    <input type="text" id="telepon" name="telepon" value="<?= $pelanggan['telepon'] ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 mb-2" for="foto">Foto</label>
                    <input type="file" id="foto" name="foto" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 mb-2" for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"><?= $pelanggan['alamat'] ?></textarea>
                </div>

                <div class="flex justify-between items-center">
                    <a href="list.php" class="text-blue-600 hover:underline">Kembali</a>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6 text-white">Daftar Pelanggan</h1>
        
        <a href="tambah.php" class="inline-block bg-blue-800 text-white px-6 py-2 rounded-lg mb-6 hover:bg-blue-700">
            Tambah Pelanggan
        </a>

        <div class="bg-gray-800 rounded-lg shadow overflow-x-auto">
            <table class="w-full table-auto">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">No Telepon</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">Foto</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    <?php
                    require_once 'koneksi.php';

                    // Ambil semua data pelanggan
                    $stmt = $conn->query("SELECT * FROM pelanggan ORDER BY id DESC");
                    $pelanggan = $stmt->fetchAll();

                    foreach($pelanggan as $index => $p): ?>
                    <tr class="hover:bg-gray-700">
                        <td class="px-6 py-4 text-gray-300"><?= $index + 1 ?></td>
                        <td class="px-6 py-4 text-gray-300"><?= $p['nama'] ?></td>
                        <td class="px-6 py-4 text-gray-300"><?= $p['telepon'] ?></td>
                        <td class="px-6 py-4">
                            <img src="uploads/<?= $p['foto'] ?>" alt="Foto Pelanggan" class="w-16 h-16 object-cover rounded">
                        </td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="detail.php?id=<?= $p['id'] ?>" class="inline-block bg-gray-600 text-white px-4 py-1 rounded hover:bg-gray-500">Detail</a>
                            <a href="edit.php?id=<?= $p['id'] ?>" class="inline-block bg-indigo-600 text-white px-4 py-1 rounded hover:bg-indigo-800">Edit</a>
                            <button onclick="hapusPelanggan(<?= $p['id'] ?>)" class="bg-violet-600 text-white px-4 py-1 rounded hover:bg-violet-800">Hapus</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function hapusPelanggan(id) {
            if(confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                window.location.href = `hapus.php?id=${id}`;
            }
        }
    </script>
</body>
</html>

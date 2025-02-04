<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-gray-800 rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold mb-8 text-white">Tambah Pelanggan</h1>

            <form action="proses_tambah.php" method="POST" enctype="multipart/form-data" class="space-y-6">
                <div>
                    <label class="block text-gray-300 mb-2" for="id">ID Pelanggan</label>
                    <input type="text" id="id" name="id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-300 mb-2" for="nama">Nama Pelanggan</label>
                    <input type="text" id="nama" name="nama" 
                        class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-300 mb-2" for="telepon">No Telepon</label>
                    <input type="text" id="telepon" name="telepon" 
                        class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-300 mb-2" for="foto">Foto</label>
                    <input type="file" id="foto" name="foto" 
                        class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-300 mb-2" for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="4" 
                        class="w-full px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:outline-none focus:border-blue-500"></textarea>
                </div>

                <div class="flex justify-between items-center">
                    <a href="list.php" class="text-blue-400 hover:underline">Kembali</a>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

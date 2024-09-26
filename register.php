<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pasien</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font Rubik -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Tailwind Config to Use Rubik -->
    <style>
        body {
            font-family: 'Rubik', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Container -->
    <div class="container mx-auto mt-10 p-8 bg-white rounded-lg shadow-md max-w-2xl relative">
        <!-- Tombol Kembali -->
        <a href="main.php" class="absolute top-4 left-4 bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300">X</a>

        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Registrasi Pasien</h1>

        <!-- Form -->
        <form action="submit_register.php" method="POST">
            <!-- ID Register dengan tombol generate -->
            <div class="mb-4 flex items-center">
                <div class="w-full">
                    <label for="id_register" class="block text-gray-700 font-medium mb-2">ID Register</label>
                    <input type="text" id="id_register" name="id_register" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="ID Register" readonly required>
                </div>
                <button type="button" onclick="generateRegisterId()" class="ml-4 bg-blue-500 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition duration-300">Reg Baru</button>
            </div>

            <div class="mb-4">
                <label for="nama" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Nama Lengkap" required>
            </div>

            <div class="mb-4">
                <label for="nik" class="block text-gray-700 font-medium mb-2">NIK</label>
                <input type="text" id="nik" name="nik" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Nomor Induk Kependudukan" required>
            </div>

            <div class="mb-4">
                <label for="tgl_lahir" class="block text-gray-700 font-medium mb-2">Tanggal Lahir</label>
                <input type="date" id="tgl_lahir" name="tgl_lahir" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div class="mb-4">
                <label for="jk" class="block text-gray-700 font-medium mb-2">Jenis Kelamin</label>
                <select id="jk" name="jk" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat</label>
                <textarea id="alamat" name="alamat" rows="3" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Alamat lengkap" required></textarea>
            </div>

            <div class="mb-4">
                <label for="no_hp" class="block text-gray-700 font-medium mb-2">Nomor HP</label>
                <input type="tel" id="no_hp" name="no_hp" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Nomor HP Aktif" required>
            </div>

            <div class="mb-4">
                <label for="poli" class="block text-gray-700 font-medium mb-2">Pilih Poli</label>
                <select id="poli" name="poli" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="umum">Poli Umum</option>
                    <option value="gigi">Poli Gigi</option>
                    <option value="anak">Poli Anak</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 transition duration-300">
                    Daftar
                </button>
            </div>
        </form>
    </div>

    <!-- Script untuk generate ID Register -->
    <script>
        function generateRegisterId() {
            fetch('get_last_register.php')
                .then(response => response.json())
                .then(data => {
                    const lastId = data.last_id;
                    const newId = String(lastId + 1).padStart(4, '0'); // Tambahkan leading zeros
                    document.getElementById('id_register').value = newId;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>

</body>

</html>

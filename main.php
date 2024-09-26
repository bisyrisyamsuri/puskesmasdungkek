<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Main</title>
    
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

    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-white text-2xl font-bold">Puskesmas Dungkek</a>
            <ul class="flex space-x-8">
                <li>
                    <a href="#" class="text-white text-lg font-normal hover:text-blue-300 transition duration-300">Master</a>
                </li>
                <li>
                    <a href="#" class="text-white text-lg font-normal hover:text-blue-300 transition duration-300">Setting</a>
                </li>
                <li>
                    <a href="register.php" class="text-white text-lg font-normal hover:text-blue-300 transition duration-300">Registrasi</a>
                </li>
                <!-- Dropdown Menu for Kunjungan -->
                <li class="relative">
                    <button id="dropdownButton" class="text-white text-lg font-normal focus:outline-none hover:text-blue-300 transition duration-300">Kunjungan</button>
                    <!-- Dropdown Content -->
                    <ul id="dropdownMenu" class="absolute hidden bg-white text-gray-700 py-2 rounded-lg shadow-lg mt-2 w-48 transition duration-300 ease-in-out">
                        <li>
                            <a href="pelayanan.php" class="block px-4 py-2 hover:bg-blue-100">Pelayanan Kunjungan</a>
                        </li>
                        <li>
                            <a href="#riwayat-kunjungan" class="block px-4 py-2 hover:bg-blue-100">Riwayat Kunjungan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="text-white text-lg font-normal hover:text-blue-300 transition duration-300">Laporan</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-10 p-8 bg-white rounded-lg shadow-md">
        <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">Selamat Datang di Puskesmas Dungkek</h1>
        <p class="text-lg text-gray-600 mb-10 text-center">Silakan pilih menu yang tersedia di navbar untuk melanjutkan.</p>

        <!-- Cards Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Card Pelayanan Kunjungan -->
            <div class="bg-blue-100 rounded-lg p-6 hover:shadow-lg transition-shadow duration-300">
                <h2 class="text-2xl font-bold text-blue-600 mb-4">Pelayanan Kunjungan</h2>
                <p class="text-gray-600 mb-4">Mengelola pelayanan kunjungan pasien di Puskesmas Dungkek.</p>
                <a href="pelayanan.php" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Lihat Pelayanan</a>
            </div>
            <!-- Card Riwayat Kunjungan -->
            <div class="bg-blue-100 rounded-lg p-6 hover:shadow-lg transition-shadow duration-300">
                <h2 class="text-2xl font-bold text-blue-600 mb-4">Riwayat Kunjungan</h2>
                <p class="text-gray-600 mb-4">Melihat dan mengelola riwayat kunjungan pasien.</p>
                <a href="#riwayat-kunjungan" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Lihat Riwayat</a>
            </div>
        </div>
    </div>

    <!-- Simple JavaScript to Toggle Dropdown Menu -->
    <script>
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    </script>

</body>

</html>

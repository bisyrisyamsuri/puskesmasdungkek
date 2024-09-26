<?php
include 'config.php'; // Include PDO connection

// Initialize search query if set
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Prepare the SQL query
if ($search) {
    $query = $pdo->prepare("SELECT * FROM pasien WHERE nama LIKE :search");
    $query->execute(['search' => "%$search%"]);
} else {
    $query = $pdo->prepare("SELECT * FROM pasien");
    $query->execute();
}

// Fetch all results
$patients = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelayanan Kunjungan</title>
    
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

    <script>
        // Reset search input after form submission
        function resetSearch() {
            document.getElementById("search").value = "";
        }
    </script>
</head>
<body class="bg-gray-100">

    <!-- Container -->
    <div class="container mx-auto mt-10 p-8 bg-white rounded-lg shadow-md">
    <a href="main.php" class="absolute top-4 left-4 bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300">X</a>

        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Data Pelayanan Kunjungan Pasien</h1>

        <!-- Search Bar -->
        <form method="GET" class="mb-6" onsubmit="resetSearch()">
            <input type="text" id="search" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Cari berdasarkan nama" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <button type="submit" class="mt-3 bg-blue-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 transition duration-300">
                Cari
            </button>
        </form>

        <!-- Table of Patients -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="py-3 px-6 text-left">ID Register</th>
                        <th class="py-3 px-6 text-left">Nama</th>
                        <th class="py-3 px-6 text-left">NIK</th>
                        <th class="py-3 px-6 text-left">Tanggal Lahir</th>
                        <th class="py-3 px-6 text-left">Jenis Kelamin</th>
                        <th class="py-3 px-6 text-left">Alamat</th>
                        <th class="py-3 px-6 text-left">Nomor HP</th>
                        <th class="py-3 px-6 text-left">Poli</th>
                        <th class="py-3 px-6 text-left">Skrining</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($patients) > 0): ?>
                        <?php foreach ($patients as $row): ?>
                        <tr class="border-b">
                            <td class="py-3 px-6"><?= htmlspecialchars($row['id_register']); ?></td>
                            <td class="py-3 px-6"><?= htmlspecialchars($row['nama']); ?></td>
                            <td class="py-3 px-6"><?= htmlspecialchars($row['nik']); ?></td>
                            <td class="py-3 px-6"><?= htmlspecialchars($row['tgl_lahir']); ?></td>
                            <td class="py-3 px-6"><?= $row['jk'] == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                            <td class="py-3 px-6"><?= htmlspecialchars($row['alamat']); ?></td>
                            <td class="py-3 px-6"><?= htmlspecialchars($row['no_hp']); ?></td>
                            <td class="py-3 px-6"><?= htmlspecialchars($row['poli']); ?></td>
                            <td class="py-3 px-6">
                                <a href="skrining.php?id=<?= htmlspecialchars($row['id_register']); ?>" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">Skrining</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="text-center text-gray-500 py-4">Tidak ada data pasien ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>

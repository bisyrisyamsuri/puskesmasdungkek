<?php
include 'config.php'; // Include PDO connection

$id_register = isset($_GET['id']) ? $_GET['id'] : '';
$jenis_skrining = isset($_GET['jenis']) ? $_GET['jenis'] : '';

// Fetch patient details if ID is provided
if ($id_register) {
    $query = $pdo->prepare("SELECT id_register, nama, tgl_lahir, jk FROM pasien WHERE id_register = :id_register");
    $query->execute(['id_register' => $id_register]);
    $patient = $query->fetch(PDO::FETCH_ASSOC);
}

if (!$patient) {
    echo "Data pasien tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Skrining Pasien</title>
    
    <!-- Tailwind CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tailwind Config to Use Rubik -->
    <style>
        body {
            font-family: 'Rubik', sans-serif;
        }
    </style>

    <script>
        function showSkriningForm() {
            const selectedType = document.getElementById('skrining_type').value;
            const forms = document.querySelectorAll('.skrining-form');

            forms.forEach(form => form.style.display = 'none'); // Hide all forms

            if (selectedType) {
                document.getElementById('form_' + selectedType).style.display = 'block'; // Show selected form
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-Rubik">
    <div class="container mx-auto mt-10 p-8 bg-white rounded-lg shadow-lg max-w-2xl">
    <a href="main.php" class="absolute top-4 left-4 bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300">X</a>
        <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Detail Skrining Pasien</h1>
        

        <!-- Display Patient Details -->
        <div class="mb-6 border border-gray-300 rounded-lg p-4">
            <div class="mb-4">
                <label class="block text-lg font-medium text-gray-600">ID Register:</label>
                <input type="text" value="<?= htmlspecialchars($patient['id_register']); ?>" class="w-full p-2 border border-gray-300 rounded-lg bg-gray-200" disabled>
            </div>
            <div class="mb-4">
                <label class="block text-lg font-medium text-gray-600">Nama:</label>
                <input type="text" value="<?= htmlspecialchars($patient['nama']); ?>" class="w-full p-2 border border-gray-300 rounded-lg bg-gray-200" disabled>
            </div>
            <div class="mb-4">
                <label class="block text-lg font-medium text-gray-600">Tanggal Lahir:</label>
                <input type="text" value="<?= htmlspecialchars($patient['tgl_lahir']); ?>" class="w-full p-2 border border-gray-300 rounded-lg bg-gray-200" disabled>
            </div>
            <div class="mb-4">
                <label class="block text-lg font-medium text-gray-600">Jenis Kelamin:</label>
                <input type="text" value="<?= $patient['jk'] == 'L' ? 'Laki-laki' : 'Perempuan'; ?>" class="w-full p-2 border border-gray-300 rounded-lg bg-gray-200" disabled>
            </div>
        </div>

        <!-- Skrining Type Selection -->
        <label class="block text-xl font-medium text-gray-700">Pilih Jenis Skrining:</label>
        <select id="skrining_type" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" onchange="showSkriningForm()">
            <option value="" disabled selected>Pilih Skrining</option>
            <option value="Anak">Anak</option>
            <option value="IbuHamil">Ibu Hamil</option>
            <option value="TB">TB</option>
        </select>

        <!-- Screening Forms -->
        <div id="form_Anak" class="skrining-form" style="display: none;">
            <?php include 'form_skrining_anak.php'; ?>
        </div>

        <div id="form_IbuHamil" class="skrining-form" style="display: none;">
            <?php include 'form_skrining_ibu_hamil.php'; ?>
        </div>

        <div id="form_TB" class="skrining-form" style="display: none;">
            <?php include 'form_skrining_tb.php'; ?>
        </div>
    </div>
</body>
</html>

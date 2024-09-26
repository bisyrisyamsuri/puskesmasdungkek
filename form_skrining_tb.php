<div class="container mx-auto mt-10 p-8 bg-white rounded-lg shadow-lg max-w-2xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Skrining TB</h1>

    <form action="" method="POST" class="space-y-6">
        <input type="hidden" name="id_register" value="<?= htmlspecialchars($patient['id_register']); ?>">
        
        <div class="mt-4">
            <label class="block text-lg font-medium text-gray-600">Apakah Anda Batuk?</label>
            <select name="batuk" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
            </select>
        </div>

        <div class="mt-4">
            <label class="block text-lg font-medium text-gray-600">Lama Batuk (hari)</label>
            <input type="number" name="lama_batuk" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-200">Simpan Skrining TB</button>
        </div>
    </form>
</div>

<?php
// Handle the form submission for TB screening
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $batuk = $_POST['batuk'];
    $lama_batuk = $_POST['lama_batuk'];
    $jenis_skrining = 'TB';
    $tgl_skrining = date('Y-m-d');

    // Insert into skrining table
    $insert = $pdo->prepare("INSERT INTO skrining (id_register, jenis_skrining, tgl_skrining, lama_batuk) 
                              VALUES (:id_register, :jenis_skrining, :tgl_skrining, :lama_batuk)");
    $insert->execute([
        'id_register' => $_POST['id_register'],
        'jenis_skrining' => $jenis_skrining,
        'tgl_skrining' => $tgl_skrining,
        'lama_batuk' => $lama_batuk,
    ]);

    echo "<script>alert('Skrining TB berhasil disimpan!'); window.location.href='list_pasien.php';</script>";
}
?>

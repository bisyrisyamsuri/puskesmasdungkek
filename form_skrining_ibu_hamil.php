<div class="container mx-auto mt-10 p-8 bg-white rounded-lg shadow-lg max-w-2xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Skrining Ibu Hamil</h1>

    <form action="" method="POST" class="space-y-6">
        <input type="hidden" name="id_register" value="<?= htmlspecialchars($patient['id_register']); ?>">
        
        <div class="mt-4">
            <label class="block text-lg font-medium text-gray-600">Usia Kandungan (minggu)</label>
            <input type="number" name="usia_kandungan" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        
        <div class="mt-4">
            <label class="block text-lg font-medium text-gray-600">Keluhan</label>
            <textarea name="keluhan" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" rows="3"></textarea>
        </div>

        <div class="mt-4">
            <label class="block text-lg font-medium text-gray-600">Berat Badan (kg)</label>
            <input type="number" step="0.01" name="berat_badan" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-200">Simpan Skrining Ibu Hamil</button>
        </div>
    </form>
</div>

<?php
// Handle the form submission for Ibu Hamil screening
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usia_kandungan = $_POST['usia_kandungan'];
    $keluhan = $_POST['keluhan'];
    $berat_badan = $_POST['berat_badan'];
    $jenis_skrining = 'Ibu Hamil';
    $tinggi_badan = '0';
    $lama_batuk = '0';
    $tgl_skrining = date('Y-m-d');

    // Insert into skrining table
    $insert = $pdo->prepare("INSERT INTO skrining (id_register, jenis_skrining, tgl_skrining, tinggi_badan, usia_kandungan, keluhan, lama_batuk, berat_badan) 
                              VALUES (:id_register, :jenis_skrining, :tgl_skrining, :tinggi_badan, :usia_kandungan, :keluhan, :lama_batuk, :berat_badan)");
    $insert->execute([
        'id_register' => $_POST['id_register'],
        'jenis_skrining' => $jenis_skrining,
        'tgl_skrining' => $tgl_skrining,
        'tinggi_badan' => $tinggi_badan,
        'usia_kandungan' => $usia_kandungan,
        'keluhan' => $keluhan,
        'lama_batuk' => $lama_batuk,
        'berat_badan' => $berat_badan,
    ]);

    echo "<script>alert('Skrining Ibu Hamil berhasil disimpan!'); window.location.href='list_pasien.php';</script>";
}
?>

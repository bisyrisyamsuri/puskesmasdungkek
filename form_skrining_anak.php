<div class="container mx-auto mt-10 p-8 bg-white rounded-lg shadow-lg max-w-2xl">
    <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Skrining Anak</h1>

    <form action="" method="POST" class="space-y-6">
        <input type="hidden" name="id_register" value="<?= htmlspecialchars($patient['id_register']); ?>">
        <div class="mt-4">
            <label class="block text-lg font-medium text-gray-600">Tinggi Badan (cm):</label>
            <input type="number" name="tinggi_badan" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div class="mt-4">
            <label class="block text-lg font-medium text-gray-600">Berat Badan (kg):</label>
            <input type="number" step="0.1" name="berat_badan_anak" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div class="mt-4">
            <label class="block text-lg font-medium text-gray-600">Sudah Imunisasi?</label>
            <select name="imunisasi" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
            </select>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-200">Simpan Skrining Anak</button>
        </div>
    </form>
</div>

<?php
// Handle the form submission for Anak screening
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tinggi_badan = $_POST['tinggi_badan'];
    $berat_badan_anak = $_POST['berat_badan_anak'];
    $imunisasi = $_POST['imunisasi'];
    $jenis_skrining = 'Anak';
    $tgl_skrining = date('Y-m-d');

    // Insert into skrining table
    $insert = $pdo->prepare("INSERT INTO skrining (id_register, jenis_skrining, tgl_skrining, tinggi_badan, berat_badan_anak, imunisasi) 
                              VALUES (:id_register, :jenis_skrining, :tgl_skrining, :tinggi_badan, :berat_badan_anak, :imunisasi)");
    $insert->execute([
        'id_register' => $_POST['id_register'],
        'jenis_skrining' => $jenis_skrining,
        'tgl_skrining' => $tgl_skrining,
        'tinggi_badan' => $tinggi_badan,
        'berat_badan_anak' => $berat_badan_anak,
        'imunisasi' => $imunisasi,
    ]);

    echo "<script>alert('Skrining Anak berhasil disimpan!'); window.location.href='list_pasien.php';</script>";
}
?>

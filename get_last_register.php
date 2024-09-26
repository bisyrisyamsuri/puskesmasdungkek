<?php
require 'config.php';

try {
    $sql = "SELECT MAX(CAST(SUBSTRING(id_register, -4) AS UNSIGNED)) AS last_id FROM pasien";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && $result['last_id'] !== null) {
        $lastId = (int) $result['last_id'];
    } else {
        $lastId = 0; // Jika belum ada data
    }

    echo json_encode(['last_id' => $lastId]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>

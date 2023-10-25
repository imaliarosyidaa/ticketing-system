<?php
//menyertakan file koneksi.php
require '../config/koneksi.php';

try {
    $id_pemesan = $_GET['id_pemesan'];

    $stmt = $pdo->prepare("DELETE FROM pelanggan WHERE id_pemesan = ?");
    $stmt->execute([$id_pemesan]);
    echo "
    <script>
    alert('Data berhasil dihapus');
    document.location.href='data_pelanggan.php'
    </script>";
    exit;
} catch (PDOException $e) {
    exit("PDO Error: ".$e->getMessage()."<br>");
}
?>
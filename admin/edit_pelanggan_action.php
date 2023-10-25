<?php
    //menyertakan file koneksi.php
    require '../config/koneksi.php';
try {
    // Retrieve form data
    $id_penumpang = $_POST["id_penumpang"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama_penumpang = $_POST["nama_penumpang"];
    $alamat_penumpang = $_POST["alamat_penumpang"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $telefone = $_POST["telefone"];

    // Prepare and execute update statement
    $stmt = $pdo->prepare("UPDATE penumpang SET id_penumpang=:id_penumpang, nama_penumpang=:nama_penumpang, username=:username,password=:password,tanggal_lahir=:tanggal_lahir,jenis_kelamin=:jenis_kelamin,telefone=:telefone WHERE id_penumpang=:id_penumpang");
    $stmt->bindParam(":id_penumpang", $id_penumpang);
    $stmt->bindParam(":nama_penumpang", $nama_penumpang);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":alamat_penumpang", $alamat_penumpang);
    $stmt->bindParam(":tanggal_lahir", $tanggal_lahir);
    $stmt->bindParam(":jenis_kelamin", $jenis_kelamin);
    $stmt->bindParam(":telefone", $telefone);
    $stmt->execute();

    echo "
    <script>
    alert('Data berhasil diedit');
    document.location.href='data_pelanggan.php'
    </script>";
    exit;
} catch (PDOException $e) {
    exit("PDO Error: ".$e->getMessage()."<br>");
}
?>

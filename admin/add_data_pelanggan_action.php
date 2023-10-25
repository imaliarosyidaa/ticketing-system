<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketing_db";

//coba koneksi pakai mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id_penumpang = $_POST["id_penumpang"];
$username = $_POST["username"];
$password = $_POST["password"];
$nama_penumpang = $_POST["nama_penumpang"];
$alamat_penumpang = $_POST["alamat_penumpang"];
$tanggal_lahir = $_POST["tanggal_lahir"];
$jenis_kelamin = $_POST["jenis_kelamin"];
$telefone = $_POST["telefone"];

$sql = "INSERT INTO penumpang (id_penumpang, username, password,nama_penumpang,alamat_penumpang,tanggal_lahir,jenis_kelamin,telefone)
VALUES ('$id_penumpang', '$username', '$password','$nama_penumpang','$alamat_penumpang','$tanggal_lahir','$jenis_kelamin','$telefone')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";
    header("Location: data_pelanggan.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>


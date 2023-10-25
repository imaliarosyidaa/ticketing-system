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

$username = $_POST["username"];
$password = $_POST["password"];
$nama_penumpang = $_POST["nama_penumpang"];
$alamat_penumpang = $_POST["alamat_penumpang"];
$tanggal_lahir = $_POST["tanggal_lahir"];
$jenis_kelamin = $_POST["jenis_kelamin"];

$sql = "INSERT INTO penumpang (username, password, nama_penumpang,alamat_penumpang,tanggal_lahir,jenis_kelamin)
VALUES ('','$username', '$password', '$nama_penumpang',$alamat_penumpang,$tanggal_lahir,$jenis_kelamin)";

if ($conn->query($sql) === TRUE) {
    header("Location: login.php");
    echo "Data berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>


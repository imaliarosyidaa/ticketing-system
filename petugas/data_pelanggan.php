<?php
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: index.php");
            exit();
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.bundle.min.js"
            rel="stylesheet" integrity="" crossorigin="anonymous"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php 
        include '../fragments/navbar_admin.php';
    ?>
    <!--Add Data Penumpang-->
    <div class="d-flex flex-direction-nav">
    <div class="container ms-5 mt-5 shadow-sm bg-body rounded" style="width: 40rem; height: 35rem;">
    <div class="pt-3 ms-3 mb-2 fw-bold pb-2" style="border-bottom: 1px solid #e5e5e5;">Add Penumpang</div>
        <form class="row g-3 ps-3 pe-2 pb-5" action="add_data_pelanggan_action.php" method="POST">
            <div class="col-12">
                <label for="inputAddress" class="form-label">ID Penumpang</label>
                <input type="text" class="form-control" id="id_penumpang" name="id_penumpang" placeholder="Masukan ID Pelanggan" required>
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_penumpang" name="nama_penumpang" placeholder="Masukan Nama Lengkap" required>
            </div>
            <div class="col-12">
                <label for="inputNama" class="form-label">Tanggal Lahir</label>
                <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir" required>
            </div>
            <div class="col-md-4">
                <label for="inputIdTarif" class="form-label">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                    <option selected>Pilih</option>
                    <option>Perempuan</option>
                    <option>Laki-laki</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Nomor Telephone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Masukan Nomor Telefone" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <!--Data Pelanggan-->
    <div class="container shadow-sm me-3 mt-5 ms-3 bg-body rounded">
    <div class="pt-3 ms-3 mb-2 fw-bold pb-2" style="border-bottom: 1px solid #e5e5e5;">Data Penumpang tiket kereta api dan pesawat</div>
    <div class="d-flex justify-content-center pt-2 pb-5 ps-3 pe-3">
    <table class="table table-bordered table-striped">
        <thead class="text-center">
            <th styles="width:20%"> No </th>
            <th styles="width:20%"> ID Penumpang </th>
            <th styles="width:20%"> Nama Lengkap </th>
            <th styles="width:10%"> Alamat </th>
            <th styles="width:10%"> Tanggal Lahir </th>
            <th styles="width:10%"> Jenis Kelamin </th>
            <th styles="width:10%"> Nomor Telephone </th>
            <th styles="width:10%"> Aksi </th>
        </thead>
        <tbody>
            <?php
                //menyertakan file koneksi.php
                require '../config/koneksi.php';

                try{
                    //Mengambil data dari database dan menampilkanya di tabel
                    $stmt = $pdo->query("SELECT * FROM penumpang");
                    $i = 1;
                    while ($row = $stmt->fetch()){
                    echo"<tr>
                        <td class='text-center'>$i</td>
                        <td>".$row["id_penumpang"]."</td>
                        <td>".$row["nama_penumpang"]."</td>
                        <td>".$row["alamat_penumpang"]."</td>
                        <td>".$row["tanggal_lahir"]."</td>
                        <td>".$row["jenis_kelamin"]."</td>
                        <td>".$row["telefone"]."</td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <a  id='update' href='edit_pelanggan.php?id_penumpang=".$row["id_penumpang"]."' class='btn btn-primary mx-2'>Edit</a>
                                <a id='delete' href='delete_pelanggan.php?id_penumpang=".$row["id_penumpang"]."' class='btn btn-danger mx-2'>Hapus</a>
                            </div>
                        </td>
                    </tr>
                    "; $i++;}
                } catch(PDOException $e){
                    exit("PDO Error: ".$e->getMessage()."<br>");
                }
            ?>
        </tbody>
    </table>
    </div>
    </div>
    </div>
</body>
</html>
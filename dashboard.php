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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.bundle.min.js"
            rel="stylesheet" integrity="" crossorigin="anonymous"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php 
        include 'fragments/navbar.php';
    ?>
    <!--Section-->
    <!--Profil-->
    <?php
        //menyertakan file koneksi.php
        require 'config/koneksi.php';

        $stmt = $pdo->prepare("SELECT * FROM penumpang WHERE username = ?");
        $stmt ->execute([$_SESSION["username"]]);
        $row = $stmt -> fetch();
    ?>
    <div>
    <div class="container ms-5 mt-5 shadow-sm bg-body rounded">
    <div class="mt-3 ms-3 mb-2 fw-bold pb-2" style="border-bottom: 1px solid #e5e5e5;">Info penumpang</div>
    <form class="ps-4 pe-4">
        <div class="row mb-3 d-inline">
            <label for="id_penumpang" class="col-sm-5 col-form-label">ID penumpang</label>
            <span>: <?php echo $row['id_penumpang'] ?> </span>
        </div>
        <br>
        <div class="row mb-3 d-inline">
            <label for="nama_penumpang" class="col-sm-5 col-form-label">Nama</label>
            <span>: <?php echo $row['nama_penumpang'] ?> </span>
        </div>
        <br>
        <div class="row mb-3 d-inline">
            <label for="alamat_penumpang" class="col-sm-5 col-form-label">Alamat</label>
            <span>: <?php echo $row['alamat_penumpang'] ?> </span>
        </div>
        <br>
        <div class="row mb-3 d-inline">
            <label for="telefone" class="col-sm-5 col-form-label">No. Telephone</label>
            <span>: <?php echo $row['telefone'] ?> </span>
        </div>
        <br>
        </form>
    </div>
    <!--Tagihan-->
    <div class="container shadow-sm ms-5 me-5 mt-1 ms-3 bg-body rounded">
    <div class="pt-3 ms-3 mb-2 fw-bold pb-2" style="border-bottom: 1px solid #e5e5e5;">Info Pemesanan</div>
    <div class="d-flex justify-content-center pt-2 pb-5 ps-3 pe-3">
    <table class="table table-bordered table-striped" style="width: 45rem;">
        <thead>
            <th styles="width:10%"> No </th>
            <th styles="width:10%"> ID Pemesanan </th>
            <th styles="width:20%"> Kode Pemesanan </th>
            <th styles="width:10%"> Tanggal Pesan </th>
            <th styles="width:10%"> Tempat Pesan </th>
            <th styles="width:10%"> Kode Kursi</th>
            <th styles="width:10%"> Tujuan </th>
            <th styles="width:20%"> Tanggal Berangkat </th>
            <th styles="width:20%"> Jam Cek In </th>
            <th styles="width:20%"> Jam Berangkat </th>
            <th styles="width:20%"> Total Bayar </th>
            <th styles="width:20%"> Aksi </th>
        </thead>
        <tbody>
            <?php
                //menyertakan file koneksi.php
                require 'config/koneksi.php';

                try{
                    //Mengambil data dari database dan menampilkanya di tabel
                    $stmt = $pdo->prepare("SELECT * FROM penumpang WHERE username = ?");
                    $stmt ->execute([$_SESSION["username"]]);
                    $row = $stmt -> fetch();

                    $stmt = $pdo->prepare("SELECT * FROM pemesanan WHERE id_pelanggan = ?");
                    $stmt -> execute([$row['id_penumpang']]);
                    
                    $i = 1;
                    while ($row = $stmt->fetch()){
                    echo"<tr>
                        <td>".$i."</td>
                        <td>".$row["id_pemesanan"]."</td>
                        <td>".$row["kode_pemesanan"]."</td>
                        <td>".$row["tanggal_pemesanan"]."</td>
                        <td>".$row["tempat_pemesanan"]."</td>
                        <td>".$row["kode_kursi"]."</td>
                        <td>".$row["tujuan"]."</td>
                        <td>".$row["tanggal_berangkat"]."</td>
                        <td>".$row["jam_cekin"]."</td>
                        <td>".$row["jam_berangkat"]."</td>
                        <td>".$row["total_bayar"]."</td>
                        <td>
                            <a  id='update' href='rute.php?id_rute=".$row["id_rute"]."' class='btn btn-primary mx-2'>Lihat Rute</a>
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
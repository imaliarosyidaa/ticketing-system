<?php
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: index.php");
            exit();
        }
    ?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Items</title>
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
    <!--Edit Data pemesan-->
                <?php
                //menyertakan file koneksi.php
                require '../config/koneksi.php';

                try {
                    // Retrieve data from database and display in form
                    $stmt = $pdo->prepare("SELECT * FROM penumpang WHERE id_penumpang=?");
                    $stmt->execute([$_GET["id_penumpang"]]);
                    $row = $stmt->fetch();

                    // Check if row exists
                    if(!$row){
                        echo "<p>Data tidak ditemukan</p>";
                    }
                    else{
                        ?>
                        <div class="container ms-5 mt-5 shadow-sm bg-body rounded" style="width: 40rem; height: 35rem;">
                        <div class="pt-3 ms-3 mb-2 fw-bold pb-2" style="border-bottom: 1px solid #e5e5e5;">Edit Penumpang</div>
                            <form class="row g-3 ps-3 pe-2 pb-5" action="edit_pelanggan_action.php" method="POST">
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">ID Penumpang</label>
                                    <input type="text" class="form-control" id="id_penumpang" name="id_penumpang" value="<?php echo $row["id_penumpang"]; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $row["username"]; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Password</label>
                                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $row["password"]; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_penumpang" name="nama_penumpang" value="<?php echo $row["nama_penumpang"]; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat_penumpang" name="alamat_penumpang" value="<?php echo $row["alamat_penumpang"]; ?>" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row["tanggal_lahir"]; ?>" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputNama" class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?php echo $row["jenis_kelamin"]; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Nomor Telephone</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $row["telefone"]; ?>" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                            
                        <?php
                    }
                } catch (PDOException $e) {
                    exit("PDO Error: ".$e->getMessage()."<br>");
                }
                ?>
</body>
</html>

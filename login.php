<?php 
    session_start();

    if  (isset($_SESSION["id_pengguna"])){
        session_unset();
        session_destroy();
    }

    $pesan="";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "config/database.php";

        $username = input($_POST["username"]);
        $password = input(md5($_POST["password"]));

        $tabel_admin= "SELECT * FROM tbl_user p
        INNER JOIN tbl_admin k ON k.kode_admin=p.kode_pengguna
        WHERE username='".$username."' and password='".$password."' LIMIT 1";
        $cek_tabel_admin = mysqli_query ($kon,$tabel_admin);
        $admin = mysqli_num_rows($cek_tabel_admin);

        $tabel_mahasiswa= "SELECT * FROM tbl_user p
        INNER JOIN tbl_mahasiswa m ON m.kode_mahasiswa=p.kode_pengguna
        WHERE username='".$username."' and password='".$password."' LIMIT 1";
        $cek_tabel_mahasiswa = mysqli_query ($kon,$tabel_mahasiswa);
        $mahasiswa = mysqli_num_rows($cek_tabel_mahasiswa);

        if ($admin>0){
            $row = mysqli_fetch_assoc($cek_tabel_admin);
            $_SESSION["id_pengguna"]=$row["id_user"];
            $_SESSION["kode_pengguna"]=$row["kode_pengguna"];
            $_SESSION["nama_admin"]=$row["nama"];
            $_SESSION["username"]=$row["username"];
            $_SESSION["level"]=$row["level"];
            $_SESSION["nip"]=$row["nip"];
            header("Location:index.php?page=beranda");
        } else if ($mahasiswa>0){
            $row = mysqli_fetch_assoc($cek_tabel_mahasiswa);
            $_SESSION["id_pengguna"]=$row["id_user"];
            $_SESSION["kode_pengguna"]=$row["kode_pengguna"];
            $_SESSION["id_mahasiswa"]=$row["id_mahasiswa"];
            $_SESSION["nama_mahasiswa"]=$row["nama"];
            $_SESSION["username"]=$row["username"];
            $_SESSION["universitas"]=$row["universitas"];
            $_SESSION["level"]=$row["level"];
            $_SESSION["foto"]=$row["foto"];
            $_SESSION["nim"]=$row["nim"];
            header("Location:index.php?page=beranda");
        } else {
            $pesan="<div class='alert alert-danger'><strong>Error!</strong> Username dan Password Salah.</div>";
        }
    }
?>

<?php
    include 'config/database.php';
    $query = mysqli_query($kon, "select * from tbl_site limit 1");
    $row = mysqli_fetch_array($query);
    $nama_instansi=$row['nama_instansi'];
    $logo=$row['logo'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="apps/pengaturan/logo/<?php echo htmlspecialchars($logo); ?>">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <link rel="stylesheet" href="template/login/css/bootstrap.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e0f7fa;
        }
        .login-container {
            max-width: 420px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-logo {
            max-width: 150px;
            margin-bottom: 15px;
        }
    </style>

    <title>Login | Badan Pusat Statistik</title>
</head>
<body>

<div class="login-container">
    <div class="login-header">
        <!-- GAMBAR DARI source/img -->
        <img src="source/img/BPS.jpg" alt="BPS" class="login-logo">
        <!-- AKHIR GAMBAR -->

        <h1>Aplikasi Absen & Kegiatan Magang</h1>
        <p>Silahkan Login Terlebih Dahulu</p>
    </div>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $pesan; ?>

        <button type="submit" class="btn btn-primary w-100">Masuk</button>
    </form>
</div>

<script src="template/login/js/bootstrap.bundle.min.js"></script>
</body>
</html>

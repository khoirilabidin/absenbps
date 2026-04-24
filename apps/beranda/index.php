<div class="row">
    <ol class="breadcrumb">
        <li><a href="index.php?page=beranda">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Beranda</li>
    </ol>
</div>
<!--/.row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Beranda</div>
            <div class="panel-body">

                <!-- Menampilkan Nama Pengguna Sesuai Level -->
                <?php if ($_SESSION['level']=='Admin' or $_SESSION['level']=='Admin'):?>
                    <h3>Selamat Datang,  <?php echo  $_SESSION["nama_admin"]; ?>.</h3>
                <?php endif; ?>
                <?php if ($_SESSION['level']=='Mahasiswa' or $_SESSION['level']=='mahasiswa'):?>
                    <h3>Selamat Datang, <?php echo  $_SESSION["nama_mahasiswa"]; ?>.</h3>
                <?php endif; ?>
                <!-- Menampilkan Nama Pengguna Sesuai Level -->

                <!-- Mengambil data table tbl_site -->
                <?php 
                    //Mengambil profil aplikasi
                    //Mengubungkan database
                    include 'config/database.php';
                    $query = mysqli_query($kon, "select * from tbl_site limit 1");    
                    $row = mysqli_fetch_array($query);
                ?>
                <!-- Mengambil data table tbl_site -->

                <!-- Info Aplikasi -->
                <div class="info-aplikasi">
                    <h2>Selamat Datang di Aplikasi Absensi dan Kegiatan Harian Mahasiswa berbasis Web</h2>
                    <p class="lead">
                        Sebuah sistem yang memungkinkan para Mahasiswa PKL di <strong><?php echo $row['nama_instansi'];?></strong> untuk melalukan absensi dan mencatat kegiatan harian dari website. Sistem ini diharapkan dapat memberi kemudahan setiap Mahasiswa PKL untuk melakukan absensi dan mencatat kegiatan harian.
                    </p>
                </div>
                <!-- Info Aplikasi -->
            
            </div>
        </div>
    </div>
</div>

<style>
    .info-aplikasi {
        margin-top: 20px;
        padding: 20px;
        background-color: #f7f7f7;
        border-left: 4px solid #007bff;
        border-radius: 5px;
        transition: box-shadow 0.3s ease-in-out, background-color 0.3s ease-in-out;
    }

    .info-aplikasi:hover {
        background-color: #e0e0e0;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .info-aplikasi h2 {
        font-size: 24px;
        color: #333;
        margin-bottom: 15px;
        font-weight: 700;
    }

    .info-aplikasi p.lead {
        font-size: 18px;
        color: #555;
        line-height: 1.6;
    }
</style>

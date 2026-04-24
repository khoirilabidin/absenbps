<?php
include '../../config/database.php';

if (!isset($_GET['id_site'])) {
    die("ID tidak ditemukan");
}
$id = $_GET['id_site'];

if (isset($_POST['submit'])) {
    $nama_instansi = $_POST['nama_instansi'];
    $alamat        = $_POST['alamat'];
    $no_telp       = $_POST['no_telp'];
    $website       = $_POST['website'];
    $pembimbing    = $_POST['pembimbing'];

    $sql = "UPDATE tbl_site SET
            nama_instansi='$nama_instansi',
            alamat='$alamat',
            no_telp='$no_telp',
            website='$website',
            pembimbing='$pembimbing'
            WHERE id_site='$id'";
    mysqli_query($kon, $sql);

    header("Location:index.php");
    exit;
}

$query = mysqli_query($kon, "SELECT * FROM tbl_site WHERE id_site='$id'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil Instansi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .card-header {
            background: #0d6efd;
            color: #fff;
            border-radius: 12px 12px 0 0;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="mb-0">Edit Profil Instansi</h5>
                </div>
                <div class="card-body">

                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Nama Instansi</label>
                            <input type="text" name="nama_instansi" class="form-control"
                                   value="<?= $data['nama_instansi']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required><?= $data['alamat']; ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No. Telp</label>
                            <input type="text" name="no_telp" class="form-control"
                                   value="<?= $data['no_telp']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Website</label>
                            <input type="text" name="website" class="form-control"
                                   value="<?= $data['website']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pembimbing</label>
                            <input type="text" name="pembimbing" class="form-control"
                                   value="<?= $data['pembimbing']; ?>" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">⬅ Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary">
                                💾 Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

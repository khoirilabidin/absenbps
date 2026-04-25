<h3>Tambah Divisi</h3>

<form method="post">
    <div class="form-group">
        <label>Nama Divisi</label>
        <input type="text" name="nama_divisi" class="form-control" required>
    </div>

    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    <a href="index.php?page=divisi" class="btn btn-secondary">Kembali</a>
</form>

<?php
if(isset($_POST['simpan'])){
    include "config/database.php";

    $nama = $_POST['nama_divisi'];

    mysqli_query($kon, "INSERT INTO tbl_divisi (nama_divisi) VALUES ('$nama')");

    echo "<script>alert('Data berhasil ditambahkan');window.location='index.php?page=divisi';</script>";
}
?>
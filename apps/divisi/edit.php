<?php
include "config/database.php";

$id = $_GET['id'];
$query = mysqli_query($kon, "SELECT * FROM tbl_divisi WHERE id_divisi='$id'");
$data = mysqli_fetch_array($query);
?>

<h3>Edit Divisi</h3>

<form method="post">
    <div class="form-group">
        <label>Nama Divisi</label>
        <input type="text" name="nama_divisi" class="form-control" value="<?php echo $data['nama_divisi']; ?>" required>
    </div>

    <button type="submit" name="update" class="btn btn-warning">Update</button>
    <a href="index.php?page=divisi" class="btn btn-secondary">Kembali</a>
</form>

<?php
if(isset($_POST['update'])){
    $nama = $_POST['nama_divisi'];

    mysqli_query($kon, "UPDATE tbl_divisi SET nama_divisi='$nama' WHERE id_divisi='$id'");

    echo "<script>alert('Data berhasil diupdate');window.location='index.php?page=divisi';</script>";
}
?>
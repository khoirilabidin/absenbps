<?php 
session_start();
if ($_SESSION["level"]!='Admin' && $_SESSION["level"]!='admin'){
    echo "<br><div class='alert alert-danger'>Tidak Memiliki Hak Akses</div>";
    exit;
}
include 'config/database.php';
$hasil = mysqli_query($kon,"SELECT * FROM tbl_site ORDER BY id_site DESC LIMIT 1");
$data  = mysqli_fetch_array($hasil);
?>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="index.php?page=beranda"><em class="fa fa-home"></em></a></li>
        <li class="active">Pengaturan Website</li>
    </ol>
</div>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading"><b>Profil Instansi</b></div>
<div class="panel-body">

<?php
if (isset($_GET['edit'])) {
    echo ($_GET['edit']=='berhasil')
    ? "<div class='alert alert-success'>Berhasil update data</div>"
    : "<div class='alert alert-danger'>Gagal update data</div>";
}
?>

<form action="apps/pengaturan/edit.php" method="post" enctype="multipart/form-data" id="formProfil">

<input type="hidden" name="id" value="<?= $data['id_site']; ?>">

<div class="form-group">
    <label>Nama Instansi</label>
    <input type="text" class="form-control edit" name="nama_instansi"
           value="<?= $data['nama_instansi']; ?>" readonly>
</div>

<div class="form-group">
    <label>Nama Pimpinan</label>
    <input type="text" class="form-control edit" name="pimpinan"
           value="<?= $data['pimpinan']; ?>" readonly>
</div>

<div class="form-group">
    <label>Pembimbing</label>
    <input type="text" class="form-control edit" name="pembimbing"
           value="<?= $data['pembimbing']; ?>" readonly>
</div>

<div class="form-group">
    <label>Alamat</label>
    <input type="text" class="form-control edit" name="alamat"
           value="<?= $data['alamat']; ?>" readonly>
</div>

<div class="form-group">
    <label>No Telp</label>
    <input type="text" class="form-control edit" name="no_telp"
           value="<?= $data['no_telp']; ?>" readonly>
</div>

<div class="form-group">
    <label>Website</label>
    <input type="text" class="form-control edit" name="website"
           value="<?= $data['website']; ?>" readonly>
</div>

<div class="form-group">
    <label>Logo</label><br>
    <img src="apps/pengaturan/logo/<?= $data['logo']; ?>" 
         id="preview" width="120" class="img-thumbnail mb-2"><br>

    <input type="file" name="logo" class="edit" disabled>
    <input type="hidden" name="logo_sebelumnya" value="<?= $data['logo']; ?>">
</div>

<div class="form-group">
    <button type="button" class="btn btn-warning" id="btnEdit">
        <i class="fa fa-pencil"></i> Edit Profil
    </button>

    <button type="submit" class="btn btn-success" id="btnSimpan"
            name="ubah_aplikasi" style="display:none;">
        <i class="fa fa-save"></i> Simpan Perubahan
    </button>
</div>

</form>
</div>
</div>
</div>
</div>

<style>
.edit[readonly] {
    background:#f5f5f5;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$("#btnEdit").click(function(){
    $(".edit").prop("readonly", false);
    $(".edit[type=file]").prop("disabled", false);
    $("#btnSimpan").show();
    $(this).hide();
});

$("input[type=file]").change(function(){
    let reader = new FileReader();
    reader.onload = e => $("#preview").attr("src", e.target.result);
    reader.readAsDataURL(this.files[0]);
});
</script>

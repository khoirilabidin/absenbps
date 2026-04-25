<h3>Data Divisi</h3>

<a href="index.php?page=tambah_divisi" class="btn btn-primary">
    Tambah Divisi
</a>

<br><br>

<?php
include "config/database.php";
$no = 1;
$query = mysqli_query($kon, "SELECT * FROM tbl_divisi ORDER BY id_divisi ASC");
?>

<table class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>Nama Divisi</th>
        <th>Aksi</th>
    </tr>

    <?php while($data = mysqli_fetch_array($query)){ ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['nama_divisi']; ?></td>
        <td>
            <a href="index.php?page=edit_divisi&id=<?php echo $data['id_divisi']; ?>" class="btn btn-warning btn-sm">Edit</a>

            <a href="apps/divisi/hapus.php?id=<?php echo $data['id_divisi']; ?>" 
               class="btn btn-danger btn-sm"
               onclick="return confirm('Yakin ingin menghapus data ini?')">
               Hapus
            </a>
        </td>
    </tr>
    <?php } ?>
</table>
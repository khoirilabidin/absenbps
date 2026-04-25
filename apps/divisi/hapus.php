<?php
include "config/database.php";

$id = $_GET['id'];

mysqli_query($kon, "DELETE FROM tbl_divisi WHERE id_divisi='$id'");

echo "<script>alert('Data berhasil dihapus');window.location='../../index.php?page=divisi';</script>";
?>
<?php
require 'connect.php';
require 'keselamatan.php';

$idpengguna=$_GET['idpengguna'];

//hapus rekod pengguna semasa
$hapus1=mysqli_query($conn,"DELETE FROM pengguna WHERE idpengguna='$idpengguna'");
//hapus rekod semasa
$hapus2=mysqli_query($conn,"DELETE FROM perekodan WHERE idpengguna='$idpengguna'");

//paparan rekod guru sudah berjaya dihapuskan
echo"<script>alert('Rekod murid ini berjaya dihapuskan.');window.location='senaraimurid.php'</script>";
?>
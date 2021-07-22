<?php
require 'connect.php';
require 'keselamatan.php';

$deletemurid=$_GET['idpengguna'];

//hapus rekod pengguna semasa
$hapus1=mysqli_query($conn,"DELETE FROM pengguna WHERE idpengguna='$deletemurid'");
//hapus rekod semasa
$hapus2=mysqli_query($conn,"DELETE FROM perekodan WHERE idpengguna='$deletemurid'");

//paparan rekod guru sudah berjaya dihapuskan
echo"<script>alert('Rekod murid ini berjaya dihapuskan.');window.location='senaraimurid.php'</script>";
?>
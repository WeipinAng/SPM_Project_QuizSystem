<?php
require 'connect.php';
require 'keselamatan.php';

$idsoal=$_GET['idsoal'];

//Laksanakan DELETE
$deletesoal = mysqli_query($conn, "DELETE FROM soalan WHERE idsoal='$idsoal'");
$deletepilihan = mysqli_query($conn,"DELETE FROM pilihan WHERE idsoal='$idsoal'");

//pastikan soalan sudah berjaya dihapuskan
echo"<script>alert('Soalan ini berjaya dihapuskan.');window.location='javascript:history.go(-1)'</script>";
?>
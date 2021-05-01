<?php
require 'connect.php';
require 'keselamatan.php';
$idpengguna=$_SESSION['idpengguna'];

//pilih idtopik untuk dihapuskan
$idtopik = $_GET['idtopik'];
$sql = "DELETE FROM topik WHERE idtopik='$idtopik'";
$delete = mysqli_query($conn,$sql);
//pastikan idtopik sudah berjaya dihapuskan
echo"<script>alert('Kuiz berjaya dihapuskan.');window.location='koleksikuizguru.php'</script>";
?>
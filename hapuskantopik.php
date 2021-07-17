<?php
require 'connect.php';
require 'keselamatan.php';

$topik=$_GET['idtopik'];

$delete = mysqli_query($conn,
    "SELECT * FROM topik AS t INNER JOIN soal AS q
    ON q.idtopik = t.idtopik INNER JOIN pilihan AS c
    ON q.idsoal = c.idsoal WHERE t.idtopik=$topik");
$datadelete = mysqli_fetch_array($delete);

//Laksanakan DELETE
$result1 = mysqli_query($conn,"DELETE FROM topik WHERE idtopik='$topik'");
$result2 = mysqli_query($conn,"DELETE FROM soalan WHERE idtopik='$topik'");
$result3 = mysqli_query($conn,"DELETE FROM pilihan WHERE idsoal='$datadelete[idsoal]'");
$result4 = mysqli_query($conn,"DELETE FROM perekodan WHERE idtopik='$topik'");

//pastikan topik sudah berjaya dihapuskan
echo"<script>alert('Topik berjaya dihapuskan.');window.location='koleksikuizguru.php'</script>";
?>
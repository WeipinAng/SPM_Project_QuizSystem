<?php
require 'connect.php';
require 'keselamatan.php';

$hapusguru = $_GET['idpengguna'];

$hapus1 = mysqli_query($conn, "SELECT * FROM pengguna AS u INNER JOIN topik AS t
ON u.idpengguna=t.idpengguna INNER JOIN soalan AS q
ON t.idtopik=q.idtopik INNER JOIN perekodan AS r
ON t.idtopik=r.idtopik INNER JOIN pilihan AS c
ON q.idsoal=c.idsoal WHERE u.idpengguna = $hapusguru");

$hapusdata = mysqli_fetch_array($hapus1);
$hapus1 = $hapusguru;
$hapus2 = $hapusdata['idpengguna'];

//hapus pengguna
$hapuskan1 = mysqli_query($conn, "DELETE FROM pengguna WHERE idpengguna='$hapus1'");
//hapus topik
$hapuskan2 = mysqli_query($conn, "DELETE FROM topik WHERE idpengguna='$hapus1'");
//hapus soalan
$hapuskan3 = mysqli_query($conn, "DELETE FROM soalan WHERE idtopik='$hapus2'");
//hapus jawapan
$hapuskan4 = mysqli_query($conn, "DELETE FROM pilihan WHERE idtopik='$hapus2'");
//hapus perekodan
$hapuskan5 = mysqli_query($conn, "DELETE FROM perekodan WHERE idtopik='$hapus2'");

//paparan rekod guru sudah berjaya dihapuskan
echo"<script>alert('Rekod guru ini berjaya dihapuskan.');window.location='senaraiguru.php'</script>";
?>
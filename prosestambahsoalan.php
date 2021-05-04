<?php
require 'connect.php';
require 'keselamatan.php';
$idpengguna=$_SESSION['idpengguna'];

if(isset($_POST['submit'])){
    $query1 = mysqli_query($conn, "SELECT idsoal FROM soalan ORDER BY idsoal DESC LIMIT 1");
    $fetch1 = mysqli_fetch_assoc($query1);
    $idsoalsebelum = $fetch1['idsoal'];
    $pengubah1 = (int)substr($idsoalsebelum,2);
    $pengubah1 ++;
    $idsoalbaharu = "S".$pengubah1;
    $nosoal ++;
    $soal = $_POST['soal'];
    $tambahsoalan = "INSERT INTO soalan (idsoal,nosoal,soal,idtopik) VALUES ('$idsoalbaharu','$nosoal','$soal','$idtopik')";

    $hasil=mysqli_query($conn,$tambahsoalan);
    
    if ($hasil==TRUE){
        $query2 = mysqli_query($conn, "SELECT idpilihan FROM pilihan ORDER BY idpilihan DESC LIMIT 1");
        $fetch2 = mysqli_fetch_assoc($query2);
        $idpilihansebelum = $fetch2['idpilihan'];
        $pengubah2 = (int)substr($idpilihansebelum,2);
        $pengubah2 ++;
        $idpilihanbaharu = "P".$pengubah2;
        $plhjwp = $_POST['plhjwp'];
        $jwp = $_POST['jwp'];
        $tambahpilihan = "INSERT INTO pilihan (idpilihan,plhjwp,jwp,idsoal) VALUES ('$idpilihanbaharu','$plhjwp','$jwp','$idsoal')";

        $hasil2=mysqli_query($conn,$tambahpilihan);
        if ($hasil2==TRUE){
            echo"<script>alert('Penambahan Soalan Berjaya.');window.location='tambahsoalan.php'</script>";
        }
    }else{
        echo"<script>alert('Penambahan Soalan Gagal.');window.location='tambahsoalan.php'</script>";
    }
}
?>
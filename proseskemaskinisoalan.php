<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');

//Jika borang dihantar, masukkan data ke pangkalan data
if(isset($_POST['update'])){
    $idsoal=$_GET['idsoal'];

    $queryidpilihan=mysqli_query($conn, "SELECT idpilihan FROM pilihan WHERE idsoal='$idsoal' ORDER BY CAST(substr(idpilihan,2,8) AS int) ASC");

    $arrayidpilihan=array();
    while ($dataidpilihan=mysqli_fetch_array($queryidpilihan)){
        //paparkan nilai asal
        array_push($arrayidpilihan,($dataidpilihan['idpilihan']));
    }

    $soal = $_POST['soalan'];
    $pilihanA = $_POST['pilihanA'];
    $pilihanB = $_POST['pilihanB'];
    $pilihanC = $_POST['pilihanC'];
    $pilihanD = $_POST['pilihanD'];

    $e = $_POST['jwp'];
    $jwpA = 0;
    $jwpB = 0;
    $jwpC = 0;
    $jwpD = 0;
    switch ($e) {
        case 'A':
            $jwpA = 1;
            break;
        
        case 'B':
            $jwpB = 1;
            break;
        
        case 'C':
            $jwpC = 1;
            break;
        
        case 'D':
            $jwpD = 1;
            break;
        
        default:
            $jwpA = 1;
    }

    //pilih soalan untuk dikemaskinikan
    $updatesoal = mysqli_query($conn,"UPDATE soalan SET soal='$soal' WHERE idsoal='$idsoal'");
    $sqlpilihanA = mysqli_query($conn, "UPDATE pilihan SET plhjwp='$pilihanA', jwp='$jwpA' WHERE idpilihan='$arrayidpilihan[0]'");
    $sqlpilihanB = mysqli_query($conn, "UPDATE pilihan SET plhjwp='$pilihanB', jwp='$jwpB' WHERE idpilihan='$arrayidpilihan[1]'");
    $sqlpilihanC = mysqli_query($conn, "UPDATE pilihan SET plhjwp='$pilihanC', jwp='$jwpC' WHERE idpilihan='$arrayidpilihan[2]'");
    $sqlpilihanD = mysqli_query($conn, "UPDATE pilihan SET plhjwp='$pilihanD', jwp='$jwpD' WHERE idpilihan='$arrayidpilihan[3]'");
    
    //pastikan idtopik dan topik sudah berjaya dikemaskinikan
    echo"<script>alert('Butiran soalan berjaya dikemaskinikan.');window.location='javascript:history.go(-2)'</script>";
}
?>
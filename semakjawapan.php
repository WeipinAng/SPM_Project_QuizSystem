<?php
require 'connect.php';
session_start();
$idpengguna=$_SESSION['idpengguna'];
$topikpilihan=$_SESSION['pilihtopik'];

//Dapatkan semua butiran rekod sedia ada berdasarkan idtopik
$querytopik = mysqli_query($conn, "SELECT * FROM topik WHERE idtopik='$topikpilihan'");
$fetchtopik = mysqli_fetch_array($querytopik);
$idtopik = $fetchtopik['idtopik'];
$topik = $fetchtopik['topik'];

if(isset($_POST['submit'])){
    $number = $_POST['number'];
    
    $queryrekod = mysqli_query($conn, "SELECT idrekod FROM perekodan ORDER BY LENGTH (idrekod) DESC, idrekod DESC LIMIT 1");
    $fetchrekod = mysqli_fetch_assoc($queryrekod);
    if($fetchrekod==0){
        $idrekod = "R1";
    } else {
        $priorrekod = (int)substr($fetchrekod['idrekod'],1);
        $pengubahrekod = $priorrekod + 1;
        $idrekod = "R".$pengubahrekod;
    }

    //mengambil tarikh semasa dari komputer
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $tarikh = date('d-m-y');

    $nilai = 0;
    $number = $_POST['number'];   
    //menerima nilai pembolehubah
    $arraypilihan=$_POST['pilihan'];
    //pengiraan markah
    for($i=0; $i<$number; $i++) {
        $pilihan=$arraypilihan[$i];
        $nilai=$nilai+$pilihan;
    }
    $jumlahmarkah=($nilai/$number)*100;

    if(fmod($jumlahmarkah,1) !== 0.00){
        $markah = number_format($jumlahmarkah, 2, '.', '');
    } else {
        $markah = $jumlahmarkah;
    }

    if ($jumlahmarkah>=85) {
        $gred = "A";
        $kenyataan = "Cemerlang";
    } else if ($jumlahmarkah>=70 && $jumlahmarkah<=84) {
        $gred = "B";
        $kenyataan = "Kepujian";
    } else if ($jumlahmarkah>=60 && $jumlahmarkah<=69) {
        $gred = "C";
        $kenyataan = "Baik";
    } else if ($jumlahmarkah>=50 && $jumlahmarkah<=59) {
        $gred = "D";
        $kenyataan = "Memuaskan";
    } else if ($jumlahmarkah>=40 && $jumlahmarkah<=49) {
        $gred = "E";
        $kenyataan = "Mencapai Tahap Minimum";
    } else {
        $gred = "F";
        $kenyataan = "Belum Mencapai Tahap Minimum";
    }
    
    //simpan rekod baru pada jadual pengambilan kuiz
    $insertrekod = mysqli_query($conn, "INSERT INTO perekodan (idrekod,tarikh,markah,gred,idpengguna,idtopik)
    VALUES ('$idrekod','$tarikh','$markah','$gred','$idpengguna','$topikpilihan')");
    
    //mesej berjaya menghantar markah kuiz
    echo"<script>alert('Tahniah! Anda telah berjaya menghantar kuiz.');
    window.location='lamantamatkuiz.php?nilai=$nilai&number=$number&markah=$markah&gred=$gred&kenyataan=$kenyataan&idtopik=$topikpilihan'</script>";
}
?>
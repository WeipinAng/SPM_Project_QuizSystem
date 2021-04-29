<?php
require 'connect.php';
require 'keselamatan.php';
$idpengguna=$_SESSION['idpengguna'];

    //pilih idtopik untuk dihapuskan
    $idtopik=$_GET['idtopik'];
    $sql="DELETE FROM topik WHERE idtopik=$idtopik";
    $delete = mysqli_query($conn,$sql);
    //pastikan idtopik sudah berjaya dihapuskan

    if(isset($_GET['delete'])){
        if($delete==TRUE){
            $idtopik=$_GET['idtopik'];
            $sql="DELETE FROM topik WHERE idtopik=$idtopik";
            echo"<script>alert('Kuiz berjaya dihapuskan.');window.location='koleksikuizguru.php'</script>";
        }else{
            echo"<script>alert('Kuiz gagal dihapuskan.');window.location='koleksikuizguru.php'</script>";
        }
    }

    
?>
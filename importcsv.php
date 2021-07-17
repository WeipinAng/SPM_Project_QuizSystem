<?php
//Fail ini adalah wajib
require 'connect.php';
require 'keselamatan.php';

//Terima fail POST
if(isset($_POST["import"])){
    $namafail=$_FILES["file"]["temp_name"];
    if($_FILES["file"]["size"] > 0){
        $file = fopen($namafail, "r");
        while(($getdata = fgetcsv($file, 10000, ",")) !== FALSE){
            //Tambah data murid dalam pangkalan data
            $import = "INSERT INTO pengguna(idpengguna, peranan, nama, katalaluan, notel)
            VALUES ('".$getdata[0]."','murid','".$getdata[1]."','".$getdata[2]."','".$getdata[3]."')";
            //Paparan mesej jika gagal
            $tambah = mysqli_query($conn,$import);
            if(!isset($tambah)){
                echo"<script>alert('Muat naik fail CSV gagal.');window.location='importmurid.php'</script>";
            }else{
                //Paparan mesej jika berjaya
                echo"<script>alert('Muat naik fail CSV berjaya.');window.location='senaraimurid.php'</script>";
            }
            }
            fclose($file);
        }
    }
?>
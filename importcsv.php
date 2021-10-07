<?php
//Fail ini adalah wajib
require 'connect.php';

//Terima fail POST
if(isset($_POST["import"])){
    $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0){
        $file = fopen($filename, "r");
        while(($getdata = fgetcsv($file, 10000, ",")) !== FALSE){
            //Tambah data murid dalam pangkalan data
            $import = "INSERT INTO pengguna (idpengguna, peranan, nama, katalaluan, notel)
            VALUES ('".$getdata[0]."','murid','".$getdata[1]."','".$getdata[2]."','".$getdata[3]."')";
            //Paparan mesej jika gagal
            $tambah = mysqli_query($conn,$import);
            if(!isset($tambah)){
                echo"<script>alert('Muat naik fail CSV gagal.');window.location='importmurid.php'</script>";
            }else{
                //Paparan mesej jika berjaya
                echo"<script>alert('Muat naik fail CSV berjaya.');window.location='importmurid.php'</script>";
            }
        }
        fclose($file);
    }
}
?>
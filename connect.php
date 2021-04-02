<?php
$host="localhost";
$user="root";
$password="";
$database="perekodan";

//perlu sama dengan nama variable di atas
$conn=mysqli_connect($host,$user,$password,$database);
if (mysqli_connect_errno()){
    echo"Proses sambung ke pangkalan data gagal.";
    exit();
}
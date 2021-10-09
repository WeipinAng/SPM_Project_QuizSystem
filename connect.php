<?php
//connect.php
//menyambung fail php dengan pangkalan data
$host="localhost";

//nama pengguna bagi phpMySQL
$user="root";

//kata laluan bagi MySQL xampp ialah null (kosongkan)
$password="";

//nama pangkalan data
$database="perekodan";

//umpukkan semua maklumat ke pemboleh ubah conn
//perlu sama dengan nama pemboleh ubah di atas
$conn=mysqli_connect($host,$user,$password,$database);
if (mysqli_connect_errno()){
    echo"Proses sambung ke pangkalan data gagal.";
    exit();
}
<?php
session_start();
//perlu guna username login
if (!isset($_SESSION['idpengguna'])){
    // jika tak login lagi, pergi ke index
    header('location:index1.php');
    exit();
}
?>
<?php
//wajib ada
    require'connect.php';

    session_start();
    //nama mesti sama dengan nama di login.php
    if (isset($_POST['idpengguna'])){
        $idpengguna = $_POST['idpengguna'];
        $katalaluan = $_POST['katalaluan'];
        //nama mesti sama dengan $conn di connect.php
        $query = mysqli_query($conn, "SELECT* FROM pengguna WHERE idpengguna='$idpengguna' AND katalaluan='$katalaluan'");
        $row = mysqli_fetch_assoc($query);
        //perlu sama dengan post
        if (mysqli_num_rows($query)==0||$row['katalaluan']!=$katalaluan){
            echo"<script>alert('Minta maaf, ID Pengguna atau kata laluan anda salah.');
            window.location='login.php'</script>";
        }else{
            $_SESSION['idpengguna']=$row['idpengguna'];
            //akan bawa ke menu.php
            $_SESSION['level']=$row['peranan'];
            header ("Location: lamanutama.php");
        }
    }
?>
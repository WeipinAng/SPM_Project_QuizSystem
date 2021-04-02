<?php
require'connect.php';
require'keselamatan.php';
//perlu sama dengan database table pengguna
$idpengguna=$_SESSION['idpengguna'];
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="./lamanutamamuridstyle.css?v=<?php echo time(); ?>">
    <title>Laman Utama</title>
</head>
<body>
    <div class="wrapper">
        <div class="dashboard">
            <h2>Laman Utama</h2>
            <div class="icon">
                <img src="images/Daftar2.png" alt="">
            </div>
            <h5><center>Murid</center></h5>
            <ul>
                <li><a href="#lamanutama.php"><i class="fas fa-info-circle"></i>Profil</a></li>
                <li><a href="#koleksikuiz.php"><i class="fab fa-wpforms"></i>Koleksi Kuiz</a></li>
                <li><a href="#prestasikuiz.php"><i class="fas fa-table"></i>Prestasi Kuiz</a></li>
            </ul>
        </div>
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="login.php">Log Keluar</a></div>
            </div>
            <div class="maincontent">
                <div class="title">BUTIRAN PENGGUNA</div>
                <div class="separator"></div>
                <div class="userprofile">
                    <h4>
                    <?php
                    //papar maklumat lengkap pengguna login
                    $dataA=mysqli_query($conn, "SELECT*FROM pengguna WHERE idpengguna='$idpengguna'");//sambung pada php di bahagian atas file ini
                    $infoA=mysqli_fetch_array($dataA);
                    ?>
                        Nama        : <?php echo $infoA['nama'];?><br>
                        ID Pengguna : <?php echo $infoA['idpengguna'];?><br>
                        No Telefon  : <?php echo $infoA['notel'];?><br>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
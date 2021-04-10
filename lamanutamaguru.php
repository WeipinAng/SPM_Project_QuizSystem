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
    <link rel="stylesheet" href="./lamanutamagurustyle.css?v=<?php echo time(); ?>">
    <title>Laman Utama</title>
</head>
<body>
    <div class="wrapper">
        <div class="dashboard">
            <h2>Laman Utama</h2>
            <div class="icon">
                <img src="images/Guru.png" alt="">
            </div>
            <h5><center>Guru</center></h5>
            <ul>
                <li><a href="#lamanutamaguru.php"><i class="fas fa-info-circle"></i>Profil</a></li>
                <li><a href="#koleksikuizguru.php"><i class="fab fa-wpforms"></i>Koleksi Kuiz</a></li>
                <li><a href="#prestasikuiz.php"><i class="fas fa-table"></i>Data Prestasi Kuiz Murid</a></li>
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
                <div class="detailbox">                     
                    <h3>
                    <?php
                    //papar maklumat lengkap pengguna login
                    $dataA=mysqli_query($conn, "SELECT*FROM pengguna WHERE idpengguna='$idpengguna'");//sambung pada php di bahagian atas file ini
                    $infoA=mysqli_fetch_array($dataA);
                    ?>
                    <div class="detail">
                        <div class="numbering">
                            <img src="images/Numbering 1.png" alt="">
                        </div>
                        <div class="nama">
                            <i class="fas fa-signature"></i>
                            <p><?php echo $infoA['nama'];?></p><br>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="numbering">
                            <img src="images/Numbering 2.png" alt="">
                        </div>
                        <div class="idpengguna">
                            <i class="fas fa-address-card"></i>
                            <p><?php echo $infoA['idpengguna'];?></p><br>
                        </div>
                    </div>     
                    <div class="detail">
                        <div class="numbering">
                            <img src="images/Numbering 3.png" alt="">
                        </div>
                        <div class="notelefon">
                            <i class="fas fa-mobile-alt"></i>
                            <p><?php echo $infoA['notel'];?></p><br>
                        </div>
                    </div>                           
                    </h3>                      
                </div>                 
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
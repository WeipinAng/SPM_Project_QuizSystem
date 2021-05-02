<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="css/lamanutamamuridstyle.css?v=<?php echo time(); ?>">
    <title>Laman Utama</title>
</head>
    <!-- header mula -->
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
    <!-- header tamat -->
            <div class="maincontent">
                <div class="title">BUTIRAN PENGGUNA</div>
                <div class="separator"></div>
                <div class="detailbox">                     
                    <h3>
                    <?php
                    //papar maklumat lengkap pengguna yang login
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
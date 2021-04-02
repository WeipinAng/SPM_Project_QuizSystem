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
    <link rel="stylesheet" href="./lamanutamastyle.css?v=<?php echo time(); ?>">
    <title>Laman Utama</title>
</head>
<body>
    <div class="wrapper">
        <div class="dashboard">
            <h2>Laman Utama</h2>
            <div class="icon">
                <img src="images/Daftar2.png" alt="">
            </div>
            <h6>
                <?php
                //papar maklumat lengkap pengguna login
                $dataA=mysqli_query($conn, "SELECT*FROM pengguna WHERE idpengguna='$idpengguna'");//sambung pada php di bahagian atas file ini
                $infoA=mysqli_fetch_array($dataA);
                ?>
                    Nama Anda   : <?php echo $infoA['nama'];?><br>
                    ID Pengguna : <?php echo $infoA['idpengguna'];?><br>
            </h6>
            <ul>
                <li><a href="#"><i class="fas fa-info-circle"></i>Profil</a></li>
                <li><a href="#"><i class="fab fa-wpforms"></i>Koleksi Kuiz</a></li>
                <li><a href="#"><i class="fas fa-table"></i>Prestasi Kuiz</a></li>
            </ul>
        </div>
        <div class="space">
            <div class="header">Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</div>
            <div class="maincontent">
                <div> -- </div>
            </div>
        </div>
    </div>
</body>
</html>
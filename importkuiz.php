<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="importkuiz.css?v=<?php echo time(); ?>">
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
                <div class="title">IMPORT KUIZ</div>
                <div class="separator"></div>
                <div class="detailbox">
                    <h3>
                    <form class="uploadform" action="prosesimportkuiz.php" method="post" name="upload_excel" enctype="multipart/form-data">
                        <div class="forminput">
                            <p>Pilih lokasi fail dalam bentuk .CSV/Excel</p>
                        </div>
                        <input class="browse" type="file" name="file" id="file" class="input-large" placeholder="browse"><br>
                        <button class="upload" type="submit" id="submit" name="import">Muat Naik</button>
                    </form>                           
                    </h3>
                </div>                 
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
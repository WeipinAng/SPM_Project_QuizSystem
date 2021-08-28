<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');

$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="koleksikuizmuridstyle.css?v=<?php echo time(); ?>">
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
                <div class="title">KOLEKSI KUIZ</div>
                <div class="separator"></div>
                <div class="detailbox">
                    <!-- output koleksi kuiz -->
                    <table class="koleksikuiz" autowidth="false">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Bil.</th>
                                <th style="width: 50%;">Topik</th>
                                <th style="width: 15%;">Bil. Soalan</th>
                                <th style="width: 25%;">Soalan</th>
                            </tr>
                        </thead>
                        <?php
                            $bil = 1;
                            $data1 = mysqli_query($conn, "SELECT * FROM topik");
                            while ($info1=mysqli_fetch_array($data1)){
                                $databil=mysqli_query($conn, "SELECT COUNT(idtopik) AS 'bil' FROM soalan WHERE idtopik='info1[idtopik]'");
                                $getbil=mysqli_fetch_array($databil);
                        ?>
                            <!-- papar dalam bentuk jadual -->
                            <tr>
                                <td><?php echo $bil++;?></td>
                                <td><?php echo $info1['topik'];?></td>
                                <td><?php echo $getbil['bil'];?></td>
                                <td>
                                    <a href="jawabsoalan.php" class="jawabsoalan">Mula Menjawab</a>
                                </td>
                            </tr>
                        <?php } ?>             
                    </table>
                        <br><br>Jumlah Rekod: <?php echo $bil-1;?><br>
                        <?php
                            function pre_r($array){
                                echo '<pre>';
                                print_r($array);
                                echo '</pre>';
                            }
                        ?>
                    </div>
            </div>
        </div>
</body>
</html>
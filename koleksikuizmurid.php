<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
?>

<head>
    <link rel="stylesheet" href="css/koleksikuizmuridstyle.css?v=<?php echo time(); ?>">
    <title>Koleksi Kuiz Murid</title>
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
                                <th style="width: 5%;">Bil.</th>
                                <th style="width: 60%;">Topik</th>
                                <th style="width: 15%;">Bil. Soalan</th>
                                <th style="width: 20%;">Soalan</th>
                            </tr>
                        </thead>
                        <?php
                            $bil = 1;
                            $querytopik = mysqli_query($conn, "SELECT * FROM topik");
                            while ($rowtopik = mysqli_fetch_array($querytopik)){
                                $idtopik = $rowtopik['idtopik'];
                                $databil = mysqli_query($conn, "SELECT nosoal FROM soalan WHERE idtopik='$idtopik'");
                                $getbil = mysqli_num_rows($databil);
                        ?>
                            <!-- papar dalam bentuk jadual -->
                            <tr>
                                <td><?php echo $bil++;?></td>
                                <td><?php echo $rowtopik['topik'];?></td>
                                <td><?php echo $getbil;?></td>
                                <td>
                                    <a href="lamanjawabsoalan.php?idtopik=<?php echo $rowtopik['idtopik']; ?>" class="jawabsoalan">Mula Menjawab</a>
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
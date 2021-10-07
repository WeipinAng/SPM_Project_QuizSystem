<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="css/skorindividustyle.css?v=<?php echo time(); ?>">
    <title>Markah Individu</title>
</head>
    <!-- header mula -->
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
    <!-- header tamat -->
            <div class="maincontent">
                <div class="title">PRESTASI TOPIK</div>
                <div class="separator"></div>
                <div class="detailbox">
                    <table class="skorindividu" autowidth="false">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Bil.</th>
                                <th style="width: 55%;">Topik</th>
                                <th style="width: 20%;">Tarikh</th>
                                <th style="width: 15%;">Markah</th>
                            </tr>
                        </thead>
                        
                        <?php
                            //output semua butiran
                            $bil = 1;
                            $queryrekod = mysqli_query($conn,"SELECT * FROM perekodan WHERE idpengguna='$idpengguna' ORDER BY tarikh DESC");
                            while($fetchrekod = mysqli_fetch_array($queryrekod)){
                                //Jadual topik
                                $datatopik = mysqli_query($conn,"SELECT * FROM topik WHERE idtopik='$fetchrekod[idtopik]'");
                                $gettopik = mysqli_fetch_array($datatopik);
                        ?>
                                
                        <!-- papar dalam bentuk jadual -->
                        <tr>
                            <td><?php echo $bil++ ;?></td>
                            <td><?php echo $gettopik['topik'] ;?></td>
                            <td><?php echo $fetchrekod['tarikh'] ;?></td>
                            <td><?php echo $fetchrekod['markah'] ;?>%</td>
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
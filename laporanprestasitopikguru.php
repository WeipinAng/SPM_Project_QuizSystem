<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');

//Data daripada URL
$topikpilihan = $_GET['idtopik'];

//Memanggil rekod
$topik = mysqli_query($conn,"SELECT * FROM topik WHERE idtopik='$topikpilihan'");
$infotopik = mysqli_fetch_array($topik);
?>

<head>
    <link rel="stylesheet" href="css/laporanprestasitopikgurustyle.css?v=<?php echo time(); ?>">
    <title>Laporan Prestasi Topik</title>
</head>
    <!-- header mula -->
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
    <!-- header tamat -->
            <div class="maincontent">
                <div class="title">LAPORAN PRESTASI MURID BAGI TOPIK:  <?php echo $infotopik['topik'];?></div>
                <a name="cetak" onclick="window.print()">CETAK</a>
                <div class="balik"><a href="#" onclick="history.go(-1)">Balik</a></div>
                <div class="separator"></div>
                <div class="detailbox" id="kandungan">
                    <table class="laporanprestasitopik" autowidth="false">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Bil.</th>
                                <th style="width: 45%;">Nama Murid</th>
                                <th style="width: 25%;">Markah Tertinggi</th>
                                <th style="width: 20%;">Bil. Ujian</th>
                            </tr>
                        </thead>
                        
                        <?php
                            //nilai pembilang pertama
                            $no = 1;
                            //Arahan SQL buat query untuk memanggil rekod berdasarkan idpengguna
                            $queryrekod = mysqli_query($conn,"SELECT idpengguna,idtopik,MAX(markah),COUNT(idpengguna) AS 'bil'
                            FROM perekodan WHERE idtopik='$topikpilihan' GROUP BY idpengguna HAVING MAX(markah)>=0");

                            while($fetchrekod = mysqli_fetch_array($queryrekod)){
                                //Sambung ke jadual pengguna untuk mendapatkan nama murid
                                $datamurid = mysqli_query($conn,"SELECT * FROM pengguna WHERE idpengguna='$fetchrekod[idpengguna]'");
                                $fetchdatamurid = mysqli_fetch_array($datamurid);
                        ?>

                        <!-- papar dalam bentuk jadual dengan memasukkan semua nilai ke dalam lajur yang ditetapkan -->
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $fetchdatamurid['nama'];?></td>
                            <td><?php echo $fetchrekod['MAX(markah)'];?>%</td>
                            <td><?php echo $fetchrekod['bil'];?></td>
                        </tr>
                        <?php } ?>
                    </table>
                    <br><br>Jumlah Rekod: <?php echo $no-1;?><br>
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
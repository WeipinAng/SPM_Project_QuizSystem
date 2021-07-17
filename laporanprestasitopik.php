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
    <link rel="stylesheet" href="laporanprestasitopikstyle.css?v=<?php echo time(); ?>">
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
                <div class="title">LAPORAN PRESTASI MURID BAGI TOPIK:  <?php echo $infotopik['topik'];?></div>
                <div class="balik"><a href="prestasitopik.php">Balik</a></div>
                <div class="separator"></div>
                <div class="detailbox">
                    <table class="laporanprestasitopik" autowidth="false">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Bil.</th>
                                <th style="width: 40%;">Nama Murid</th>
                                <th style="width: 20%;">Jenis Soalan</th>
                                <th style="width: 15%;">Markah Tertinggi</th>
                                <th style="width: 15%;">Bil. Ujian</th>
                            </tr>
                        </thead>
                        
                        <?php
                            //nilai pembilang pertama
                            $no = 1;
                            //Arahan SQL buat query untuk memanggil rekod berdasarkan idpengguna
                            $rekod = mysqli_query($conn,"SELECT idpengguna,idtopik,MAX(skor),COUNT(idpengguna) AS 'Bil'
                            FROM perekodan WHERE idtopik='$topikpilihan' GROUP BY idpengguna HAVING MAX(skor)>=0");

                            while($inforekod = mysqli_fetch_array($rekod)){
                                //Sambung ke jadual pengguna untuk mendapatkan nama murid
                                $murid = mysqli_query($conn,"SELECT * FROM pengguna WHERE idpengguna='$inforekod[idpengguna]'");
                                $infomurid = mysqli_fetch_array($murid);
                        ?>

                        <!-- papar dalam bentuk jadual dengan memasukkan semua nilai ke dalam lajur yang ditetapkan -->
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $infomurid['nama'];?></td>
                            <td><?php
                                if($inforekod['jenis']==1){
                                    echo "MCQ/TF";
                                }else{
                                    echo "FIB";
                                }?></td>
                            <td><?php echo $inforekod['MAX(skor)'];?></td>
                            <td><?php echo $inforekod['Bil'];?></td>
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
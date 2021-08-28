<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="laporanstatistikadminstyle.css?v=<?php echo time(); ?>">
    <title>Laman Utama</title>
</head>
    <!-- header mula -->
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
    <!-- header tamat -->
            <div class="maincontent" id="print">
                <div class="title">LAPORAN STATISTIK</div>
                <button class="cetak" onclick="window.print();">Cetak Laporan</button>
                <div class="separator"></div>

                <div class="detailbox">
                    <p style="font-size: 16px">LAPORAN: Bilangan Soalan Mengikut Topik</p><br>
                    <?php
                        //output laporan statistik
                        $tambah = "SELECT * FROM topik";
                        $hasil = mysqli_query($conn,$tambah);                       
                        ?>
                        <table class="laporan" autowidth="false">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">Bil.</th>
                                    <th style="width: 60%;">Topik</th>
                                    <th style="width: 30%;">Bil. Soalan</th>
                                </tr>
                            </thead>
                            <?php
                                $jumlah = 1;
                                $topik=mysqli_query($conn, "SELECT * FROM topik");
                                //while loop untuk memastikan semua data dipaparkan
                                while($infotopik = mysqli_fetch_array($topik)){
                                    //sambung ke entiti soalan
                                    $soalan=mysqli_query($conn, "SELECT idtopik,COUNT(idtopik) as 'bil' FROM soalan GROUP BY idtopik");
                                    $infosoalan=mysqli_fetch_array($soalan);
                            ?>
                            <!-- masukkan data ke dalam lajur yang ditetapkan -->
                            <tr>
                                <td><?php echo $jumlah++;?></td>
                                <td><?php echo $infotopik['topik'];?></td>
                                <td><?php echo $infosoalan['bil'];?></td>
                            </tr>
                                <?php } ?>
                        </table>
                        <br><br>Jumlah Rekod: <?php echo $jumlah-1;?><br>
                    </div>
            </div>
        </div>
</body>
</html>
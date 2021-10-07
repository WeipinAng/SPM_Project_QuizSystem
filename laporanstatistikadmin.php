<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="css/laporanstatistikadminstyle.css?v=<?php echo time(); ?>">
    <title>Laporan Statistik Admin</title>
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
                <a name="cetak" onclick="window.print()">CETAK</a>
                <div class="separator"></div>
                <div class="detailbox" id="printablearea">
                    <p style="font-size: 16px">LAPORAN: Bilangan Soalan Mengikut Topik</p><br>
                    <?php
                        //output laporan statistik
                        $tambah = "SELECT * FROM topik";
                        $hasil = mysqli_query($conn,$tambah);                       
                        ?>

                        <table class="laporan">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">Bil.</th>
                                    <th style="width: 60%;">Topik</th>
                                    <th style="width: 30%;">Bil. Soalan</th>
                                </tr>
                            </thead>
                            <?php
                                $no = 1;
                                $querytopik = mysqli_query($conn, "SELECT * FROM topik");
                                //while loop untuk memastikan semua data dipaparkan
                                while($fetchtopik = mysqli_fetch_array($querytopik)){
                                    //sambung ke entiti soalan
                                    $soalan = mysqli_query($conn, "SELECT nosoal,COUNT(nosoal) as 'bil' FROM soalan WHERE idtopik='$fetchtopik[idtopik]'");
                                    $fetchsoalan = mysqli_fetch_array($soalan);
                            ?>
                            <!-- masukkan data ke dalam lajur yang ditetapkan -->
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $fetchtopik['topik'];?></td>
                                <td><?php echo $fetchsoalan['bil'];?></td>
                            </tr>
                                <?php } ?>
                        </table>
                        <br><br>Jumlah Rekod: <?php echo $no-1;?><br>
                    </div>
            </div>
        </div>
</body>
</html>
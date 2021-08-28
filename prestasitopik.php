<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="prestasitopikstyle.css?v=<?php echo time(); ?>">
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
                <div class="title">PRESTASI MURID BERDASARKAN TOPIK</div>
                <div class="separator"></div>
                <div class="detailbox">
                    <?php
                        //output prestasi topik
                        $tambah = "SELECT * FROM topik";
                        $hasil = mysqli_query($conn,$tambah);                       
                        ?>
                        <table class="prestasi" autowidth="false">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">Bil.</th>
                                    <th style="width: 60%;">Topik</th>
                                    <th style="width: 10%;">Bil. Menjawab</th>
                                    <th style="width: 20%;">Laporan</th>
                                </tr>
                            </thead>
                            <?php
                                $jumlah = 1;
                                $topik=mysqli_query($conn, "SELECT * FROM topik");
                                //while loop untuk memastikan semua data dipaparkan
                                while($infotopik = mysqli_fetch_array($topik)){
                                    //sambung ke entiti soalan
                                    $rekod=mysqli_query($conn, "SELECT idtopik,COUNT(idtopik) as 'bil' FROM perekodan WHERE idtopik='$infotopik[idtopik]'");
                                    $infobiljawab=mysqli_fetch_array($rekod);
                            ?>
                            <!-- masukkan data ke dalam lajur yang ditetapkan -->
                            <tr>
                                <td><?php echo $jumlah++;?></td>
                                <td><?php echo $infotopik['topik'];?></td>
                                <td><?php echo $infobiljawab['bil'];?></td>
                                <td>
                                    <a href="laporanprestasitopikguru.php?idtopik=<?php echo $infotopik['idtopik']; ?>" class="laporan">Buka Laporan</a>
                                </td>
                            </tr>
                                <?php } ?>
                        </table>
                        <br><br>Jumlah Rekod: <?php echo $jumlah-1;?><br>
                    </div>
            </div>
        </div>
</body>
</html>
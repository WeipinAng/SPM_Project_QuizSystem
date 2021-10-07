<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');

//dapatkan idtopik
$topikpilihan=$_GET['idtopik'];
$_SESSION['pilihan']=$topikpilihan;

//sambung ke entiti topik
$result = mysqli_query($conn, "SELECT * FROM topik WHERE idtopik='$topikpilihan'");
while ($res=mysqli_fetch_array($result)){
    //paparkan nilai asal
    $papartopik=$res['topik'];
}
?>

<head>
    <link rel="stylesheet" href="css/koleksisoalankuizstyle.css?v=<?php echo time(); ?>">
    <title>Koleksi Soalan Kuiz</title>
</head>
    <!-- header mula -->
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
    <!-- header tamat -->
            <div class="maincontent">
                <div class="title">SENARAI SOALAN KUIZ BAGI TOPIK: <?php echo $papartopik;?></div>
                <div class="balik"><a href="koleksikuizguru.php">Balik</a></div>
                <div class="separator"></div>
                <div class="detailbox"> 
                    <!-- output soalan kuiz -->  
                    <table class="koleksisoalankuiz" autowidth="false">
                        <thead>
                            <tr>
                                <th style="width: 5%;">Bil.</th>
                                <th style="width: 50%;">Soalan</th>
                                <th style="width: 20%;">Jawapan</th>
                                <th style="width: 25%;">Tindakan</th>
                            </tr>
                        </thead>
                        <?php
                            //output semua butiran
                            $bil = 1;
                            $querysoalan = "SELECT * FROM soalan AS q INNER JOIN pilihan AS a ON q.idsoal=a.idsoal
                            WHERE q.idtopik='$topikpilihan' AND a.jwp=1 GROUP BY a.idsoal ORDER BY q.idsoal ASC";
                            $resultquerysoalan = mysqli_query($conn, $querysoalan);
                            //while loop untuk memastikan semua data dipaparkan
                            while($info1 = mysqli_fetch_array($resultquerysoalan)){ ?> 
                            <!-- papar dalam bentuk jadual -->
                            <tr>
                                <?php
                                    $querysoal = mysqli_query($conn, "SELECT * FROM soalan");
                                    $rows = mysqli_fetch_assoc($querysoal);
                                ?>
                                <td><?php echo $bil++;?></td>
                                <td><?php echo $info1['soal'];?></td>
                                <td><?php echo $info1['plhjwp'];?></td>
                                <td>
                                    <a href="kemaskinisoalan.php?idsoal=<?php echo $info1['idsoal']; ?>" class="kemaskinisoalan">Kemas Kini</a>
                                    <a href="hapuskansoalan.php?idsoal=<?php echo $info1['idsoal']; ?>" class="hapussoalan" onclick="return confirm('Adakah anda ingin hapuskan soalan ini?')">Hapuskan</a>
                                </td>
                            </tr>
                            <?php } ?>
                    </table>
                    <br><br>Jumlah Rekod: <?php echo $bil-1;?><br>
                    
                </div>
            </div>
        </div>
</body>
</html>
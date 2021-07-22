<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');

$idpengguna=$_SESSION['idpengguna'];
//dapatkan idtopik
$topikpilihan=$_GET['idtopik'];
$_SESSION['pilihan']=$topikpilihan;

//sambung ke entiti topik
$result = mysqli_query($conn, "SELECT * FROM topik WHERE idtopik='$topikpilihan'");
while ($res=mysqli_fetch_array($result)){
    //paparkan nilai asal
    $papartopik=$res['topik'];
    $paparmarkah=$res['markah'];
}
?>

<head>
    <link rel="stylesheet" href="css/koleksisoalankuizstyle.css?v=<?php echo time(); ?>">
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
                <div class="title">SENARAI SOALAN KUIZ BAGI TOPIK: <?php echo $papartopik;?></div>
                <div class="tambahsoalan"><a href="tambahsoalan.php" class="fas fa-plus" style="font-size: 20px;"></a></div>
                <div class="balik"><a href="koleksikuizguru.php">Balik</a></div>
                <div class="separator"></div>
                <div class="detailbox"> 
                    <!-- output soalan kuiz -->  
                    <table class="koleksisoalankuiz" autowidth="false">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Bil.</th>
                                <th style="width: 50%;">Soalan</th>
                                <th style="width: 20%;">Jawapan</th>
                                <th style="width: 20%;">Tindakan</th>
                            </tr>
                        </thead>
                        <?php
                            //output semua butiran
                            $bil = 1;
                            $data1 = mysqli_query($conn, "SELECT * FROM soalan AS q INNER JOIN pilihan AS a ON q.idsoal=a.idsoal
                            WHERE q.idtopik=$topikpilihan AND a.jawapan=1 GROUP BY a.idsoal ORDER BY q.idsoal ASC");
                            //while loop untuk memastikan semua data dipaparkan
                            while($info1 = mysqli_fetch_array($data1)){ ?>
                                
                            <!-- papar dalam bentuk jadual -->
                            <tr>
                                <td><?php echo $bil++;?></td>
                                <td><?php echo $info1['soal'];?></td>
                                <td><?php echo $info1['pilihanjawapan'];?></td>
                                <td>
                                    <a href="kemaskinisoalan.php?idsoal=<?php echo $info1['idsoal']; ?>" class="kemaskinisoalan">Kemas Kini</a>
                                    <a href="hapuskansoalan.php?idsoal=<?php echo $info1['idsoal']; ?>" class="hapussoalan" onclick="return confirm('Adakah anda ingin hapuskan soalan ini?')">Hapuskan</a>
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
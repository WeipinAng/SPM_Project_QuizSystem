<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');

$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="css/koleksikuizgurustyle.css?v=<?php echo time(); ?>">
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
                <div class="tambahkuiz"><a href="tambahkuiz.php">Tambah Kuiz</a></div>
                <div class="separator"></div>
                <div class="detailbox">
                    <!-- output koleksi kuiz -->  
                    <?php
                        //output butiran topik
                        $tambah = "SELECT * FROM topik";
                        $hasil = mysqli_query($conn,$tambah);                       
                        ?>
                        <table class="koleksikuiz" autowidth="false">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">Bil.</th>
                                    <th style="width: 40%;">Topik</th>
                                    <th style="width: 25%;">Pengurusan Topik</th>
                                    <th style="width: 25%;">Pengurusan Soalan</th>
                                </tr>
                            </thead>
                            <?php
                                if($hasil==TRUE){
                                    //ambil semua rows
                                    $count = mysqli_num_rows($hasil);
                                    if($count>0){
                                        //output semua butiran
                                        $bil = 1;
                                        //while loop untuk memastikan semua data dipaparkan
                                        while($rows = mysqli_fetch_assoc($hasil)): ?>
                                            
                                        <!-- papar dalam bentuk jadual -->
                                        <tr>
                                            <td><?php echo $bil++;?></td>
                                            <td><?php echo $rows['topik'];?></td>
                                            <td>
                                                <a href="kemaskinitopik.php?idtopik=<?php echo $rows['idtopik']; ?>" class="kemaskinikuiz">Kemas Kini</a>
                                                <a href="hapuskantopik.php?idtopik=<?php echo $rows['idtopik']; ?>" class="hapuskuiz" onclick="return confirm('Adakah anda ingin hapuskan kuiz ini?')">Hapuskan</a>
                                            </td>
                                            <td>
                                                <a href="koleksisoalankuiz.php" class="koleksisoalankuiz"><i class="fas fa-eye"></i></a>
                                                <a href="tambahsoalan.php" class="tambahsoalan">Tambah</a>
                                            </td>
                                        </tr>
                                        <?php endwhile; }} ?>
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
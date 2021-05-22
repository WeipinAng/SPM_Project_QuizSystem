<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
?>

<head>
    <link rel="stylesheet" href="senaraigurustyle.css?v=<?php echo time(); ?>">
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
                <div class="title">SENARAI GURU BERDAFTAR</div>
                <!-- search bar mula -->
                    
                <!-- search bar tamat -->
                <div class="separator"></div>
                <div class="detailbox">                     
                    <!-- output senarai guru -->
                    <table class="senaraiguru" autowidth="false">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Bil.</th>
                                <th style="width: 20%;">Nama Guru</th>
                                <th style="width: 20%;">ID Pengguna</th>
                                <th style="width: 15%;">Bil. Topik</th>
                                <th style="width: 15%;">Bil. Soalan</th>
                                <th style="width: 20%;">Tindakan</th>
                            </tr>
                        </thead>  
                    <?php
                        $bil = 1;
                        //output senarai guru mengikut susunan ASC
                        $data = mysqli_query($conn,"SELECT * FROM pengguna WHERE peranan='guru' ORDER BY nama ASC");
                        while($info1 = mysqli_fetch_assoc($data)){
                            //sambung ke entiti topik
                            $topik = mysqli_query($conn,"SELECT idtopik, COUNT(idtopik) as 'biltopik' FROM topik WHERE idpengguna='$info1[idpengguna]' GROUP BY idpengguna");
                            $datatopik = mysqli_fetch_assoc($topik);
                            //sambung ke entiti soalan
                            $soalan = mysqli_query($conn,"SELECT idsoal, COUNT(idsoal) as 'bilsoal' FROM soalan WHERE idtopik='$datatopik[idtopik]' GROUP BY idsoal");
                            $datasoalan = mysqli_fetch_assoc($soalan);
                    ?>        
                        <tr>
                            <td><?php echo $bil;?></td>
                            <td><?php echo $info1['nama'];?></td>
                            <td><?php echo $info1['idpengguna'];?></td>
                            <td><?php echo $datatopik['biltopik'];?></td>
                            <td><?php echo $datasoalan['bilsoal'];?></td>
                            <td>
                                <a href="kemaskiniguru.php?idtopik=<?php echo $info1['idpengguna']; ?>" class="kemaskiniguru">Kemas Kini</a>
                                <a href="hapuskanguru.php?idtopik=<?php echo $info1['idpengguna']; ?>" class="hapusguru" onclick="return confirm('Adakah anda ingin hapuskan kesemua rekod guru ini?')">Hapuskan</a>
                            </td>
                        </tr>
                        <?php $bil++;} ?>
                    </table>
                    <br><br>Jumlah Rekod: <?php echo $bil-1;?><br>
                    </div>
            </div>
        </div>
</body>
</html>
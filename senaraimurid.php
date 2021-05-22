<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
?>

<head>
    <link rel="stylesheet" href="senaraimuridstyle.css?v=<?php echo time(); ?>">
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
                <div class="title">SENARAI MURID BERDAFTAR</div>
                <!-- search bar mula -->
                    
                <!-- search bar tamat -->
                <div class="separator"></div>
                <div class="detailbox">    
                    <!-- output senarai guru -->
                    <?php
                        //output butiran topik
                        $tambah = "SELECT * FROM pengguna WHERE peranan='murid' ORDER BY nama ASC";
                        $hasil = mysqli_query($conn,$tambah);                       
                        ?>
                        <table class="senaraimurid" autowidth="false">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">Bil.</th>
                                    <th style="width: 30%;">Nama Murid</th>
                                    <th style="width: 15%;">ID Pengguna</th>
                                    <th style="width: 20%;">Kata Laluan</th>
                                    <th style="width: 25%;">Tindakan</th>
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
                                            <td><?php echo $rows['nama'];?></td>
                                            <td><?php echo $rows['idpengguna'];?></td>
                                            <td><?php echo $rows['katalaluan'];?></td>
                                            <td>
                                                <a href="kemaskinimurid.php?idtopik=<?php echo $rows['idpengguna']; ?>" class="kemaskinimurid">Kemas Kini</a>
                                                <a href="hapuskanmurid.php?idtopik=<?php echo $rows['idpengguna']; ?>" class="hapusmurid" onclick="return confirm('Adakah anda ingin hapuskan kesemua rekod murid ini?')">Hapuskan</a>
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
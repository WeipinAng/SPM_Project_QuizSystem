<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="skorindividustyle.css?v=<?php echo time(); ?>">
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
                <div class="title">REKOD MARKAH YANG DICAPAI</div>
                <div class="separator"></div>
                <div class="detailbox">
                    <table class="koleksikuiz" autowidth="false">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Bil.</th>
                                <th style="width: 30%;">Topik</th>
                                <th style="width: 15%;">Jenis Soalan</th>
                                <th style="width: 25%;">Tarikh/Masa</th>
                                <th style="width: 10%;">Skor</th>
                                <th style="width: 10%;">Markah</th>
                            </tr>
                        </thead>
                        
                        <?php
                            //output semua butiran
                            $no = 1;
                            $data1 = mysqli_query($conn,"SELECT * FROM perekodan WHERE idpengguna='$idpengguna' ORDER BY tarikh desc limit 0,10");
                            while($info1 = mysqli_fetch_array($data1)){
                                //Jadual topik
                                $datatopik = mysqli_query($conn,"SELECT * FROM topik WHERE idtopik='$info1[idtopik]'");
                                $gettopik = mysqli_fetch_array($datatopik);

                                //Jadual soalan, dapatkan bilangan soalan
                                $datasoalan = mysqli_query($conn,"SELECT jenis,COUNT(idtopik) as 'bil' FROM soalan WHERE idtopik='$info1[idtopik]' GROUP BY jenis");
                                $infosoalan = mysqli_fetch_array($datasoalan);

                                //Pemboleh ubah VALUE
                                $jenissoalan = $info1['jenis'];
                                $bilsoalan = $infosoalan['bil'];
                                $markahtopik = $gettopik['markah'];
                        ?>
                                
                            <!-- papar dalam bentuk jadual -->
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $gettopik['topik'];?></td>
                                <td><?php
                                    if($jenissoalan==1){
                                        echo "MCQ/TF";
                                    }else{
                                        echo "FIB";
                                    }?></td>
                                <td><?php echo date('d-m-Y g:i A', strtotime($info1['tarikh']));?></td>
                                <td><?php echo $info1['markah'];?></td>
                                <td><?php echo number_format(($info1['markah']/$bilsoalan)*$markahtopik);?>%</td>
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
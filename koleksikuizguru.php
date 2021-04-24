<?php
require'connect.php';
require'keselamatan.php';
include('template/sidebarguru.php');
$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="koleksikuizgurustyle.css?v=<?php echo time(); ?>">
    <title>Laman Utama</title>
</head>
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
            <div class="maincontent">
                <div class="title">KOLEKSI KUIZ</div>
                <div class="tambahkuiz"><a href="tambahkuiz.php">Tambah Kuiz</a></div> 
                <div class="separator"></div>
                <div class="detailbox">
                    <!-- search bar mula -->
                    
                    <!-- search bar tamat -->    
                    <!-- output koleksi kuiz -->
                    <table class="koleksikuiz">
                        <tr>
                            <th>Bil.</th>
                            <th>Id Topik</th>
                            <th>Topik</th>
                            <th>Tindakan</th>
                        </tr>

                        <?php
                            //output butiran topik
                            $tambah = "SELECT * FROM topik";
                            $hasil = mysqli_query($conn,$tambah);
                            $bil = 0;
                            if($hasil==TRUE){
                                //ambil semua rows
                                $count = mysqli_num_rows($hasil);
                                if($count>0){
                                   //output semua butiran
                                   while($rows = mysqli_fetch_assoc($hasil)){
                                       //while loop untuk memastikan semua data dipaparkan
                                       $bil++;
                                       $idtopik = $rows['idtopik'];
                                       $topik = $rows['topik'];
                                    }
                                }else{
                                }
                            }
                        ?>
                        <!-- papar dalam bentuk jadual -->
                        <tr>
                            <td><?php echo $bil;?></td>
                            <td><?php echo $idtopik;?></td>
                            <td><?php echo $topik;?></td>
                            <td>
                                <a href="" class="kemaskinikuiz">Kemas Kini</a>
                                <a href="" class="hapuskuiz">Hapuskan</a>
                            </td>
                        </tr>
                    </table>
                    <div class="button">
                        <button class="submit" type="submit">Daftar Soalan</button>
                        <button class="reset" type="reset">Reset</button>
                    </div>                     
                </div>                 
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
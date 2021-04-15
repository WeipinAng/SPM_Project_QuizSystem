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
                <div class="separator"></div>
                <div class="detailbox">                     
                    <!-- output koleksi kuiz -->
                    <a href="tambahkuiz.php" class="tambahkuiz">Tambah Kuiz</a>
                    <table class="koleksikuiz">
                        <tr>
                            <th>Id Topik</th>
                            <th>Topik</th>
                            <th>Jumlah Soalan</th>
                            <th>Tindakan</th>
                        </tr>

                        <tr>
                            <td>1.</td>
                            <td>Kata Kerja</td>
                            <td>5</td>
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
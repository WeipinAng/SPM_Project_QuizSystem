<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');

//dapatkan idtopik
$topikpilihan=$_GET['idtopik'];
$_SESSION['pilihtopik']=$topikpilihan;

//entiti TOPIK
$datatopik=mysqli_query($conn, "SELECT * FROM topik WHERE idtopik=$topikpilihan");
$gettopik=mysqli_fetch_array($datatopik);

//entiti SOALAN
$datasoalan=mysqli_query($conn, "SELECT * FROM soalan WHERE idtopik=$gettopik[idtopik]");
$getsoalan=mysqli_fetch_array($datasoalan);

$total=mysqli_num_rows($datasoalan);

$result = mysqli_query($conn, "SELECT * FROM topik WHERE idtopik='$topikpilihan'");
while ($res=mysqli_fetch_array($result)){
    //paparkan nilai asal
    $papartopik=$res['topik'];
}
?>

<head>
    <link rel="stylesheet" href="css/jawabsoalanstyle.css?v=<?php echo time(); ?>">
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
                <div class="title">KUIZ BAGI TOPIK: <?php echo $papartopik;?></div>
                <div class="balik"><a href="koleksikuizmurid.php">Balik</a></div>
                <div class="separator"></div>
                <div class="detailbox"> 
                    <div class="arahan">
                        <p style="font-size: 14px">Arahan kepada murid-murid:</p><br>
                        <p style="font-size: 14px">Jawab semua soalan. Pilih jawapan yang paling sesuai.</p>
                    </div>
                    <button class="submit" type="submit" id="submit" name="import">Muat Naik</button>
                </div>
            </div>
        </div>
</body>
</html>
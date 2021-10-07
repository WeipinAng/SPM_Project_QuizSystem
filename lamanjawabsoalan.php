<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');

//dapatkan idtopik
$topikpilihan=$_GET['idtopik'];
$_SESSION['pilihtopik']=$topikpilihan;

$querysoalan = mysqli_query($conn, "SELECT * FROM soalan WHERE idtopik='$topikpilihan'");
$jumlahsoalan = mysqli_num_rows($querysoalan);

//sambung ke entiti topik
$result = mysqli_query($conn, "SELECT * FROM topik WHERE idtopik='$topikpilihan'");
while ($res=mysqli_fetch_array($result)){
    //paparkan nilai asal
    $papartopik=$res['topik'];
}
?>

<head>
    <link rel="stylesheet" href="css/lamanjawabsoalanstyle.css?v=<?php echo time(); ?>">
    <title>Laman Jawab Kuiz</title>
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
                <img style="float: right; margin: 0px 0px 15px 15px;" src="images/Jawab Soalan.png" width="50%" alt="">
                    <div class="arahan">
                        <p style="font-size: 15px">Arahan kepada murid-murid:</p>
                        <p style="font-size: 15px">Jawab semua soalan. Pilih jawapan yang paling sesuai.</p>
                        <br>
                    </div>
                        <p style="font-size: 15px"><strong>Butiran Kuiz:</strong></p>
                        <p>Jumlah Soalan: <?php echo $jumlahsoalan; ?></p><br>
                        <p>Jenis Soalan:</p>
                        <p>Soalan Objektif Beraneka Pilihan</p>
                        <br><p>~ Selamat Mencuba ~</p>
                        
                    <a href="jawabsoalan.php?n=0&idtopik=<?php echo $topikpilihan;?>&jumlahsoalan=<?php echo $jumlahsoalan;?>">
                    <button class="submit" type="submit" name="submit">Mula Menjawab</button></a>
                </div>
            </div>
        </div>
</body>
</html>
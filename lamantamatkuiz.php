<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');

$topikpilihan = $_GET['idtopik'];
$nilai = $_GET['nilai'];
$number = $_GET['number'];
$markah = $_GET['markah'];
$gred = $_GET['gred'];
$kenyataan = $_GET['kenyataan'];

//sambung ke entiti topik
$result = mysqli_query($conn, "SELECT * FROM topik WHERE idtopik='$topikpilihan'");
while ($res=mysqli_fetch_array($result)){
    //paparkan nilai asal
    $papartopik=$res['topik'];
}
?>

<head>
    <link rel="stylesheet" href="css/lamantamatkuizstyle.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <title>Laman Tamat Kuiz</title>
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
                        <p style="font-size: 20px">KUIZ TAMAT</p>
                        <p style="font-size: 20px">_________________________________</p><br>
                        <p style="font-size: 15px">Tahniah! Anda telah selesai menjawab semua soalan.</p>
                        <br>
                    </div>
                        <p style="font-size: 15px"><strong>Bilangan Soalan: <?php echo $number; ?></strong></p>
                        <p style="font-size: 15px"><strong>Jawapan Betul: <?php echo $nilai; ?></strong></p>
                        <p style="font-size: 15px"><strong>Gred: <?php echo $gred; ?></strong></p>
                        <p style="font-size: 15px"><strong>Catatan: <?php echo $kenyataan; ?></strong></p>

                    <button onclick="window.location.href='skorindividu.php'">Prestasi</button>
                    <div class="circularprogressbarcontainer">
                        <div class="circularprogressbar">
                            <div class="valuecontainer">
                                <?php echo $markah; ?>%
                            </div>
                        </div>
                    </div>
                    <div class="circularprogressbarcontainer2">
                        <div class="circularprogressbar2">
                            <div class="valuecontainer2">
                                <?php echo $markah; ?>%
                            </div>
                        </div>
                    </div>
                    
                    <script>
                        let progressbar = document.querySelector(".circularprogressbar");
                        let valuecontainer = document.querySelector(".valuecontainer");
                        
                        let progressvalue = 0;
                        let progressendvalue = parseInt('<?php echo "$markah"; ?>');
                        let speed = 30;

                        let progress = setInterval( () => {
                            progressvalue++;
                            valuecontainer.textContent = `${progressvalue}%`;
                            progressbar.style.background = `conic-gradient(
                                #4d5bf9 ${progressvalue * 3.6}deg,
                                #cadcff ${progressvalue * 3.6}deg
                            )`
                            if(progressvalue == progressendvalue){
                                clearInterval(progress);
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
</body>
</html>
<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebarguru.php');
$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="css/kemaskinikuizstyle.css?v=<?php echo time(); ?>">
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
                <div class="title">KEMAS KINI KUIZ</div>
                <div class="balik"><a href="koleksikuizguru.php">Balik</a></div>
                <div class="separator"></div>
                <div class="detailbox">    
                    <!-- output borang pengemaskinian kuiz -->
                    <h3>
                    <?php
                        //pilih topik untuk dikemaskinikan
                        $idtopik = $_GET['idtopik'];
                        $res = "SELECT * FROM topik WHERE idtopik='$idtopik'";
                        $update = mysqli_query($conn,$res);
                        
                        //semak sama ada
                        if($update==TRUE){
                            $count = mysqli_num_rows($update);
                            if($count==1){
                                $rows = mysqli_fetch_assoc($update);
                                $topik = $rows['topik'];
                            }else{
                                header ("Location: koleksikuizguru.php");
                            }
                        }

                        if(isset($_POST['update'])) {
                            $topik = $_POST['topik'];
                            //kemaskini idtopik dan topik dengan data baharu
                            $sql = "UPDATE topik SET topik='$topik' WHERE idtopik='$idtopik'";
                            $update = mysqli_query($conn,$sql);
                            //pastikan idtopik dan topik sudah berjaya dikemaskinikan
                            echo"<script>alert('Butiran kuiz berjaya dikemaskinikan.');window.location='koleksikuizguru.php'</script>";
                        }
                    ?>
                    
                    <form class="quizform" action="" method="post" spellcheck="false">
                        <div class="forminputtopik">
                            <input class="topik" type="text" name="topik" placeholder="Topik asal: <?php echo $topik; ?>"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required></input>
                        </div>

                        <div class="forminput">
                            <input type="text" name="jumlahsoalan" placeholder="Jumlah Soalan" maxlength="3"
                            onkeypress='return event.charCode>=48 && event.charCode<=57' required>
                        </div>

                        <div class="button">
                            <button class="submit" type="submit" name="update">Kemas Kini</button>
                            <button class="reset" type="reset">Reset</button>
                        </div>
                    </form>                           
                    </h3>
                    <!-- borang pengemaskinian kuiz tamat -->
                </div>
            </div>
        </div>
</body>
</html>
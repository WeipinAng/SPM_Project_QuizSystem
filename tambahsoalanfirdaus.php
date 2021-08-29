<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');

//Jika borang dihantar, masukkan data ke pangkalan data
if(isset($_POST["submit"])){
    //variable posted
    $nosoal=$_POST['nosoal'];
    $idtopik=$_POST['idtopik'];
    $soal=$_POST['paparansoalan'];
    $jawapanbetul=$_POST['jawapanbetul'];
    //array value
    $pilihan=array();
    $pilihan[1]=$_POST['pilihan1'];
    $pilihan[2]=$_POST['pilihan2'];
    $pilihan[3]=$_POST['pilihan3'];
    $pilihan[4]=$_POST['pilihan4'];
    
        //simpan rekod dalam jadual soalan
        $soal = $_POST['soal'];
        $query = mysqli_query($conn, "SELECT idsoal FROM soal ORDER BY idsoal DESC LIMIT 1");
        $fetch = mysqli_fetch_assoc($query);
        $idsoalsebelum = $fetch['idsoal'];
        $pengubah = (int)substr($idsoalsebelum,-1);
        $pengubah ++;
        $idsoalbaharu = "S".$pengubah;

        $query2 = "SELECT * FROM soalan";
        $nosoal = mysqli_query($conn,$query2);
        $total = mysqli_num_rows($nosoal);
        $next = $total+1;

        $idtopik=$_GET['idtopikbaharu'];

        //tambah soalan
        $tambah = "INSERT INTO soalan (idsoal,nosoal,soal,idtopik) VALUES ('$idsoalbaharu','$next','$soal','$idtopik')";
        echo"<script>alert('Pendaftaran Soalan Berjaya.');window.location='tambahsoalan.php?idtopik=$idtopik'</script>";

        //tambah jawapan
        $idpilihan = $_POST['idpilihan'];
        $query3 = mysqli_query($conn, "SELECT idpilihan FROM pilihan ORDER BY idpilihan DESC LIMIT 1");
        $fetch3 = mysqli_fetch_assoc($query3);
        $idpilihansebelum = $fetch3['idpilihan'];
        $pengubah3 = (int)substr($idpilihansebelum,-1);
        $pengubah3 ++;
        $idpilihanbaharu = "P".$pengubah3;

        if($insertrow){
            foreach($pilihan as $plhjwp =>$plhjwp){
                if($plhjwp != ''){
                    if($jawapanbetul=$plhjwp){
                        $jwp=1;
                    }else{
                        $jwp=0;
                    }
                    //simpan rekod baharu dalam jadual pilihan
                    $sql = "INSERT INTO pilihan (idpilihan,plhjwp,jwp,idsoal) VALUES('$idpilihanbaharu','$plhjwp','$jwp','$idsoalbaharu')";
                    $hasil2=mysqli_query($conn,$sql);
                }
            }
        }
}

$topikpilihan=$_GET['idtopik'];
$_SESSION['topiksemasa']=$topikpilihan;
//jumlah soalan
$query4 = "SELECT * FROM soalan WHERE idtopik='$topikpilihan'";
$soalan = mysqli_query($conn,$query4);
$total=mysqli_num_rows($soalan);
$next=$total+1;
?>

<head>
    <link rel="stylesheet" href="css/tambahsoalanstyle.css?v=<?php echo time(); ?>">
</head>
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
            <div class="maincontent">
                <div class="title">PENAMBAHAN SOALAN BAHARU</div>
                <div class="balik"><a href="koleksikuizguru.php">Balik</a></div>
                <div class="separator"></div>
                <div class="detailbox">                   
                    <h3>
                    <!-- output borang pendaftaran -->
                    <form id="formsoalan" name="question" class="quizform" method="post" spellcheck="false">
                        <h5>Topik:
                        <ins>
                            <?php $topik=$_GET['topik'];?>
                            <?php echo $topik;?>
                        </ins>
                        </h5>

                        <!--Ulangan paparan soalan berdasarkan jumlahsoalan yang dimasukkan oleh pengguna-->
                        <?php
                            for($i=0;$i<$jumlahsoalan;$i++){
                        ?>
                        
                            <!--Masukkan butiran soalan ke sistem-->
                            <div id="forminputsoalan" class="forminputsoalan">
                                <input class="soalan" type="text" name="soal" placeholder="Soalan <?php echo ($i+1);?>"
                                onkeypress='return event.charCode>=32 && event.charCode<=125' required></input>
                            </div>

                            <!--Ulangan 4 pilihan bagi setiap soalan-->
                            <?php
                                for($j=0;$j<4;$j++){
                            ?>
                            <!--Pilihan-->
                                <div class="forminput">                                    
                                    <input type="text" name="plhjwp[<?php echo $i;?>][<?php echo $j;?>]" placeholder="Pilihan"
                                    onkeypress='return event.charCode>=32 && event.charCode<=125' required/>
                                    <p>-</p>
                                    <input type="radio" name="jwp[<?php echo $i;?>]" value="<?php echo($i.$j);?>" required> 
                                </div>
                            <?php
                                }
                            ?>                           
                        <?php
                            }
                        ?>

                        <div class="button">
                            <button class="submit" type="submit" name="submit">Daftar Soalan</button>
                            <button class="reset" type="reset">Reset</button>
                        </div>
                    </form>
                    </h3>
                </div>                 
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
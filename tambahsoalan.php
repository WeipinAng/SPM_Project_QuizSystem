<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
$idpengguna=$_SESSION['idpengguna'];

//dapatkan idtopik
$topikpilihan=$_GET['idtopik'];
$_SESSION['pilihan']=$topikpilihan;

//sambung ke entiti topik
$resulttopikpilihan = mysqli_query($conn, "SELECT * FROM topik WHERE idtopik='$topikpilihan'");
while ($res=mysqli_fetch_array($resulttopikpilihan)){
    //paparkan nilai asal
    $papartopik=$res['topik'];
}

//Jika borang dihantar, masukkan data ke pangkalan data
if(isset($_POST['submit'])){
    //Menerima pemboleh ubah dari halaman tambahkuiz.php
    $idtopik=$_GET['idtopik'];

    $soal = $_POST['soalan'];
    $pilihanA = $_POST['pilihanA'];
    $pilihanB = $_POST['pilihanB'];
    $pilihanC = $_POST['pilihanC'];
    $pilihanD = $_POST['pilihanD'];

    $querysoal = mysqli_query($conn, "SELECT idsoal FROM soalan ORDER BY LENGTH (idsoal) DESC, idsoal DESC LIMIT 1");
    $fetchsoal = mysqli_fetch_assoc($querysoal);
    $priorsoal = (int)substr($fetchsoal['idsoal'],1);
    $pengubahsoal = $priorsoal + 1;
    $idsoal = "S".$pengubahsoal;

    $querynosoal = mysqli_query($conn, "SELECT nosoal FROM soalan WHERE idtopik='$topikpilihan'");
    $soalterakhirtopik = mysqli_num_rows($querynosoal);
    $nosoal = $soalterakhirtopik + 1;
    $tambahsoalan = mysqli_query($conn, "INSERT INTO soalan (idsoal,nosoal,soal,idtopik) VALUES ('$idsoal','$nosoal','$soal','$idtopik')");
    if (!$tambahsoalan){
        echo"<script>alert('Penambahan Soalan Gagal.');window.location='tambahsoalan.php'</script>";
    }
    
    $querypilihan = mysqli_query($conn, "SELECT idpilihan FROM pilihan ORDER BY LENGTH (idpilihan) DESC, idpilihan DESC LIMIT 1");
    $fetchpilihan = mysqli_fetch_assoc($querypilihan);
    $priorpilihan = (int)substr($fetchpilihan['idpilihan'],1);
    $pengubahpilihanA = $priorpilihan + 1;
    $pengubahpilihanB = $pengubahpilihanA + 1;
    $pengubahpilihanC = $pengubahpilihanB + 1;
    $pengubahpilihanD = $pengubahpilihanC + 1;
    $idpilihanA = "P".$pengubahpilihanA;
    $idpilihanB = "P".$pengubahpilihanB;
    $idpilihanC = "P".$pengubahpilihanC;
    $idpilihanD = "P".$pengubahpilihanD;

    $e = $_POST['jwp'];
    $jwpA = 0;
    $jwpB = 0;
    $jwpC = 0;
    $jwpD = 0;
    switch ($e) {
        case 'A':
            $jwpA = 1;
            break;
        
        case 'B':
            $jwpB = 1;
            break;
        
        case 'C':
            $jwpC = 1;
            break;
        
        case 'D':
            $jwpD = 1;
            break;
        
        default:
            $jwpA = 1;
    }
    $tambahA = mysqli_query($conn, "INSERT INTO pilihan (idpilihan,plhjwp,jwp,idsoal) VALUES ('$idpilihanA','$pilihanA','$jwpA','$idsoal')");
    $tambahB = mysqli_query($conn, "INSERT INTO pilihan (idpilihan,plhjwp,jwp,idsoal) VALUES ('$idpilihanB','$pilihanB','$jwpB','$idsoal')");
    $tambahC = mysqli_query($conn, "INSERT INTO pilihan (idpilihan,plhjwp,jwp,idsoal) VALUES ('$idpilihanC','$pilihanC','$jwpC','$idsoal')");
    $tambahD = mysqli_query($conn, "INSERT INTO pilihan (idpilihan,plhjwp,jwp,idsoal) VALUES ('$idpilihanD','$pilihanD','$jwpD','$idsoal')");

    echo"<script>alert('Penambahan Soalan Berjaya.');window.location='koleksikuizguru.php'</script>";
}
?>

<head>
    <link rel="stylesheet" href="css/daftarsoalanstyle.css?v=<?php echo time(); ?>">
    <title>Penambahan Soalan</title>
</head>
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
            <div class="maincontent">
                <div class="title">PENAMBAHAN SOALAN BAGI TOPIK: <?php echo $papartopik;?></div>
                <div class="balik"><a href="koleksikuizguru.php">Balik</a></div>
                <div class="separator"></div>
                <div class="detailbox">                   
                    <h3>
                    <!-- output borang pendaftaran soalan -->
                    <?php
                    echo '
                    <form id="formsoalan" name="question" class="quizform" action="tambahsoalan.php?idtopik=' . @$_GET['idtopik'] . '" method="post" spellcheck="false">
                    ';
                    
                    echo '
                        <div id="forminputsoalan" class="forminputsoalan">
                            <input class="soalan" type="text" name="soalan" placeholder="Soalan" required>
                        </div>

                        <div class="forminput">
                            <input type="text" name="pilihanA" placeholder="Pilihan Jawapan A" required>
                            <p>A</p>
                        </div>
                        <div class="forminput">
                            <input type="text" name="pilihanB" placeholder="Pilihan Jawapan B" required>
                            <p>B</p>
                        </div>
                        <div class="forminput">
                            <input type="text" name="pilihanC" placeholder="Pilihan Jawapan C" required>
                            <p>C</p>
                        </div>
                        <div class="forminput"> 
                            <input type="text" name="pilihanD" placeholder="Pilihan Jawapan D" required>
                            <p>D</p>
                        </div>
                        
                        <div class="forminput">
                            <select class="jawapan" name="jwp" placeholder="Pilih jawapan yang betul." required>
                            <option value="" disabled selected hidden>Jawapan Soalan</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            </select><br/><br/>
                        </div>';
                    
                    echo '<div class="button">
                            <button class="submit" type="submit" name="submit">Daftar Soalan</button>
                            <button class="reset" type="reset">Reset</button>
                        </div>                      
                    </form>';
                    ?>
                    </h3>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
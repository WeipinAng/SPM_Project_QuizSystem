<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
$idpengguna=$_SESSION['idpengguna'];
$jumlahsoalan=$_GET['jumlahsoalan'];

//Jika borang dihantar, masukkan data ke pangkalan data
if(isset($_POST['submit'])){
    //ulangan soalan berdasarkan jumlahsoalan yang dimasukkan oleh pengguna
    for ($i=1; $i <= $jumlahsoalan; $i++) {

        //Menerima pemboleh ubah dari halaman tambahkuiz.php
        $jumlahsoalan=$_GET['jumlahsoalan'];
        $idtopik=$_GET['idtopik'];

        //addslashes() function returns a string with backslashes in front of predefined characters
        $soal = addslashes($_POST['soal' . $i]);
        $pilihanA = addslashes($_POST[$i . '1']);
        $pilihanB = addslashes($_POST[$i . '2']);
        $pilihanC = addslashes($_POST[$i . '3']);
        $pilihanD = addslashes($_POST[$i . '4']);

        $querysoal = mysqli_query($conn, "SELECT idsoal FROM soalan ORDER BY LENGTH (idsoal) DESC, idsoal DESC LIMIT 1");
        $fetchsoal = mysqli_fetch_assoc($querysoal);
        $priorsoal = (int)substr($fetchsoal['idsoal'],1);
        $pengubahsoal = $priorsoal + 1;
        $idsoal = "S".$pengubahsoal;
        $tambahsoalan = mysqli_query($conn, "INSERT INTO soalan (idsoal,nosoal,soal,idtopik) VALUES ('$idsoal','$i','$soal','$idtopik')");
        if (!$tambahsoalan){
            echo"<script>alert('Pendaftaran Soalan Gagal.');window.location='daftarsoalan.php'</script>";
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

        $e = $_POST['jwp' . $i];
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
    }
    echo"<script>alert('Pendaftaran Soalan Berjaya.');window.location='koleksikuizguru.php'</script>";
}
?>

<head>
    <link rel="stylesheet" href="css/daftarsoalanstyle.css?v=<?php echo time(); ?>">
    <title>Pendaftaran Soalan</title>
</head>
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
            <div class="maincontent">
                <div class="title">BUTIRAN SOALAN</div>
                <div class="balik"><a href="koleksikuizguru.php">Balik</a></div>
                <div class="separator"></div>
                <div class="detailbox">                   
                    <h3>
                    <!-- output borang pendaftaran soalan -->
                    <?php
                    echo '
                    <form id="formsoalan" name="question" class="quizform" action="daftarsoalan.php?jumlahsoalan=' . @$_GET['jumlahsoalan'] . '&idtopik=' . @$_GET['idtopik'] . '" method="post" spellcheck="false">                  
                    <h5>Topik:
                        <ins>
                    ';
                            $topik = @$_GET['topik'];
                            echo $topik;
                    echo '
                        </ins>
                    </h5>
                    ';
                    
                    //Ulangan paparan soalan berdasarkan jumlahsoalan yang dimasukkan oleh pengguna                  
                    for ($i=1; $i <= @$_GET['jumlahsoalan']; $i++) {
                    echo '
                        <div id="forminputsoalan" class="forminputsoalan">
                            <label class="col-md-12 control-label" for="soal' . $i . ' "></label>
                            <input class="soalan" type="text" name="soal' . $i . '" placeholder="Soalan ' . $i . '" required>
                        </div>

                        <div class="forminput">
                            <label class="col-md-12 control-label" for="' . $i . '1"></label>  
                            <input type="text" id="' . $i . '1" name="' . $i . '1" placeholder="Pilihan Jawapan A" required>
                            <p>A</p>
                        </div>
                        <div class="forminput">
                            <label class="col-md-12 control-label" for="' . $i . '2"></label>  
                            <input type="text" id="' . $i . '2" name="' . $i . '2" placeholder="Pilihan Jawapan B" required>
                            <p>B</p>
                        </div>
                        <div class="forminput">
                            <label class="col-md-12 control-label" for="' . $i . '3"></label>  
                            <input type="text" id="' . $i . '3" name="' . $i . '3" placeholder="Pilihan Jawapan C" required>
                            <p>C</p>
                        </div>
                        <div class="forminput">
                            <label class="col-md-12 control-label" for="' . $i . '4"></label>  
                            <input type="text" id="' . $i . '4" name="' . $i . '4" placeholder="Pilihan Jawapan D" required>
                            <p>D</p>
                        </div>
                        
                        <div class="forminput">
                            <select class="jawapan" id="jwp' . $i . '" name="jwp' . $i . '" placeholder="Pilih jawapan yang betul." required>
                            <option value="" disabled selected hidden>Jawapan Soalan ' . $i . '</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            </select><br/><br/>
                        </div>';                               
                    }
                    
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
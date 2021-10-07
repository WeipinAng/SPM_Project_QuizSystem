<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
?>

<head>
    <link rel="stylesheet" href="css/kemaskinisoalanstyle.css?v=<?php echo time(); ?>">
    <script src="jquery_library.js"></script>
    <script src="bootstrap.min.js"></script>
    <title>Kemas Kini Soalan</title>
</head>
    <!-- header mula -->
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
    <!-- header tamat -->
            <div class="maincontent">
                <div class="title">KEMAS KINI SOALAN KUIZ</div>
                <div class="balik"><a href="#" onclick="history.go(-1)">Balik</a></div>
                <div class="separator"></div>
                <div class="detailbox">    
                    <!-- output borang pengemaskinian soalan -->
                    <?php
                        //dapatkan idsoal dari koleksisoalankuiz.php
                        $idsoal=$_GET['idsoal'];
                        //pilihan data berdasarkan idsoal
                        $pilihsoalan=mysqli_query($conn, "SELECT * FROM soalan WHERE idsoal='$idsoal'");
                        while ($datasoalan=mysqli_fetch_array($pilihsoalan)){
                            //paparkan nilai asal
                            $soal=$datasoalan['soal'];
                            $nosoal=$datasoalan['nosoal'];
                        }

                        $pilihan=mysqli_query($conn, "SELECT * FROM pilihan
                        WHERE idsoal='$idsoal' AND idsoal IN (
                                SELECT idsoal
                                FROM pilihan
                                GROUP BY idsoal
                                HAVING COUNT(distinct plhjwp) > 1
                            )"
                        );

                        $plhjwp=array();
                        while ($datapilihan=mysqli_fetch_array($pilihan)){
                            //paparkan nilai asal
                            array_push($plhjwp,($datapilihan['plhjwp']));
                        }

                        $jwp=mysqli_query($conn, "SELECT jwp FROM pilihan WHERE idsoal='$idsoal' ORDER BY idpilihan ASC");

                        $jwparray=array();
                        while ($datajwp=mysqli_fetch_array($jwp)){
                            //nilai asal
                            array_push($jwparray,($datajwp['jwp']));
                        }
                    ?>
                    <h3>Soalan <?php echo $nosoal;?></h3><br>
                    <h3>

                    <?php
                    if ($jwparray[0] == 1){
                        $paparanjwp = 'A';
                    } else if ($jwparray[1] == 1){
                        $paparanjwp = 'B';
                    } else if ($jwparray[2] == 1){
                        $paparanjwp = 'C';
                    } else {
                        $paparanjwp = 'D';
                    }
                    ?>

                    <script>
                        $(document).ready(function() {
                        console.log("ready!");
                        $("select option[value='<?php echo $paparanjwp; ?>']").attr("selected","selected");
                        var paparanjwp = "<?php echo $paparanjwp; ?>";
                    });
                    </script>
                    
                    <?php
                    echo '
                    <form id="formsoalan" name="question" class="updatequestionform" action="proseskemaskinisoalan.php?idsoal=' . @$_GET['idsoal'] . '" method="post" spellcheck="false">
                    ';
                    
                    echo '
                        <div id="forminputsoalan" class="forminputsoalan">
                            <input class="soalan" type="text" name="soalan" placeholder="Soalan" value="'.$soal.'" required>
                        </div>

                        <div class="forminput">
                            <input type="text" name="pilihanA" placeholder="Pilihan Jawapan A" value="'.$plhjwp[0].'" required>
                            <p>A</p>
                        </div>
                        <div class="forminput">
                            <input type="text" name="pilihanB" placeholder="Pilihan Jawapan B" value="'.$plhjwp[1].'" required>
                            <p>B</p>
                        </div>
                        <div class="forminput">
                            <input type="text" name="pilihanC" placeholder="Pilihan Jawapan C" value="'.$plhjwp[2].'" required>
                            <p>C</p>
                        </div>
                        <div class="forminput"> 
                            <input type="text" name="pilihanD" placeholder="Pilihan Jawapan D" value="'.$plhjwp[3].'" required>
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
                    ?>

                    <?php
                    echo '<div class="button">
                            <button class="submit" type="submit" name="update">Kemas Kini Soalan</button>
                            <button class="reset" type="reset">Reset</button>
                        </div> 
                    </form>';
                    ?>
                    </h3>
                </div>
            </div>
        </div>
</body>
</html>
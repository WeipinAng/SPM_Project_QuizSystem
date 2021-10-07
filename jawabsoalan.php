<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
$idpengguna=$_SESSION['idpengguna'];

//dapatkan idtopik
$topikpilihan=$_SESSION['pilihtopik'];

//entiti topik
$datatopik = mysqli_query($conn, "SELECT * FROM soalan AS q
    INNER JOIN topik AS t ON t.idtopik=q.idtopik
    WHERE t.idtopik='$topikpilihan' GROUP BY q.idsoal");
$getsoalan = mysqli_fetch_array($datatopik);
//jumlah soalan
$total = mysqli_num_rows($datatopik);
//set no soalan
$number = (int)$_GET['n'];

//dapatkan soalan
$querysoalan = mysqli_query($conn, "SELECT * FROM soalan WHERE nosoal='$number' AND idtopik='$topikpilihan'");
$soalan = mysqli_fetch_assoc($querysoalan);
?>

<head>
    <link rel="stylesheet" href="css/jawabsoalanstyle.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <title>Jawab Kuiz</title>
</head>
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
            <div class="maincontent">
                <?php
                //sambung ke entiti topik
                $result = mysqli_query($conn, "SELECT * FROM topik WHERE idtopik='$topikpilihan'");
                while ($res=mysqli_fetch_array($result)){
                    //paparkan nilai asal
                    $papartopik=$res['topik'];
                }
                ?>
                <div class="title">TOPIK: <?php echo $papartopik;?></div>
                <div class="balik"><a href="#" onclick="history.go(-1)">Balik</a></div>
                <div class="separator"></div>
                <div class="detailbox">              
                    <h3>
                    <?php
                        echo "Sila baca soalan dengan teliti.";
                        echo "</br>";
                        echo "</br>";
                    ?>

                    <hr><br>

                    <form id="formsoalan" name="question" class="quizform" action="semakjawapan.php" method="post" spellcheck="false">
                        <?php
                        $querysoalan2 = mysqli_query($conn, "SELECT * FROM soalan WHERE idtopik='$topikpilihan'");
                        while ($paparsoalan = mysqli_fetch_array($querysoalan2)){
                            $idsoal=$paparsoalan['idsoal'];
                        ?>
                        <br>
                    
                            <div id="forminputsoalan" class="forminputsoalan">
                                Soalan <?php echo ($number+1); ?> / <?php echo $total; ?>
                                <br><br>
                                <input class="soalan" type="text" name="soalan" placeholder="Soalan" value="<?php echo $paparsoalan['soal']; ?>" readonly required>                        
                            </div>
                            <br>

                            <?php
                            //dapatkan pilihan jawapan
                            $querypilihanjawapan = mysqli_query($conn, 
                            "SELECT *
                            FROM pilihan
                            WHERE idsoal='$idsoal' AND idsoal IN (
                                SELECT idsoal
                                FROM pilihan
                                GROUP BY idsoal
                                HAVING COUNT(distinct plhjwp) > 1
                            )");
                            $choice = $querypilihanjawapan;

                            $i=0;
                            while($paparpilihan=mysqli_fetch_array($choice)){
                            ?>

                            <div class="forminput">
                                <div class="radiogroup">
                                    <label class="radiolabel">
                                    <input type="radio" name="pilihan[<?php echo $number;?>]" value="<?php echo $paparpilihan['jwp'];?>" required>
                                    <input type="text" value="<?php echo $paparpilihan['plhjwp']; ?>" readonly required>
                                    <span></span>
                                    </label>
                                    <br>
                                </div>
                            </div>

                            <?php
                            $i = $i+1;
                            } ?>
                            
                        <?php
                        $number = $number+1;
                        } ?>

                        <br><p style="text-align:center;">----------  KUIZ TAMAT  ----------</p><br>

                        <div class="button">
                            <input type="hidden" name="number" value="<?php echo $number;?>">
                            <button class="submit" type="submit" name="submit">Hantar</button>
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
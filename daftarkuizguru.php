<?php
require'connect.php';
require'keselamatan.php';
//perlu sama dengan database table pengguna
$idpengguna=$_SESSION['idpengguna'];
//post value yang nama sama dengan database
if(isset($_POST['idpengguna'])){
    $soal=$_POST['soal'];
    $plhjwp=$_POST['plhjwp'];

    $daftarsoalan="INSERT INTO soalan (soal) VALUES
    ('$soal')";//jika ada ralat
    $hasil=mysqli_query($conn,$daftarsoalan);
        if ($hasil){
            echo"<script>alert('Pendaftaran soalan berjaya.');window.location='login.php'</script>";
        }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="./daftarkuizgurustyle.css?v=<?php echo time(); ?>">
    <title>Laman Utama</title>
</head>
<body>
    <div class="wrapper">
        <div class="dashboard">
            <h2>Laman Utama</h2>
            <div class="icon">
                <img src="images/Guru.png" alt="">
            </div>
            <h5><center>Guru</center></h5>
            <ul>
                <li><a href="lamanutamaguru.php"><i class="fas fa-info-circle"></i>Profil</a></li>
                <li><a href="koleksikuizguru.php"><i class="fab fa-wpforms"></i>Koleksi Kuiz</a></li>
                <li><a href="daftarkuizguru.php"><i class="fab fa-wpforms"></i>Daftar Kuiz</a></li>
                <li><a href="prestasikuiz.php"><i class="fas fa-table"></i>Data Prestasi Kuiz Murid</a></li>
            </ul>
        </div>
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="login.php">Log Keluar</a></div>
            </div>
            <div class="maincontent">
                <div class="title">DAFTAR KUIZ BAHARU</div>
                <div class="separator"></div>
                <div class="detailbox">                     
                    <h3>
                    <!-- output borang pendaftaran -->
                    <form class="quizform" action="" method="post" spellcheck="false">
                        <div class="forminputsoalan">
                            <input class="soalan" type="text" name="soal" placeholder="Soalan &#10"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required></input>
                        </div>

                        <div class="forminput">
                            <input type="text" name="plhjwp" placeholder="Pilihan 1"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required>
                        </div>

                        <div class="forminput">
                            <input type="text" name="plhjwp" placeholder="Pilihan 2"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required>
                        </div>

                        <div class="forminput">
                            <input type="text" name="plhjwp" placeholder="Pilihan 3"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required>
                        </div>

                        <div class="forminput">
                            <input type="text" name="plhjwp" placeholder="Pilihan 4"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required>
                        </div>

                        <div class="forminput">
                            <select class="jawapan" name="jwp" required>
                            <!-- using an empty value attribute on the "placeholder" option-->
                            <!-- "disabled" option stops it from being selected with both mouse and keyboard-->
                            <!-- When the "select" element is required, it allows use of the ":invalid" CSS pseudo-class which allows you to style the "select" element when in its "placeholder" state-->
                            <!-- "hidden" element: the option is visible in dropdown, but it is not selectable-->
                            <option value="" disabled selected hidden>Jawapan</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            </select>
                        </div>

                        <div class="button">
                            <button class="submit" type="submit">Daftar Soalan</button>
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
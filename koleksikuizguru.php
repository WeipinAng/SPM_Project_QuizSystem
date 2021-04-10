<?php
require'connect.php';
require'keselamatan.php';
//perlu sama dengan database table pengguna
$idpengguna=$_SESSION['idpengguna'];
//post value yang nama sama dengan database
if(isset($_POST['idpengguna'])){
    $idpengguna=$_POST['idpengguna'];
    $katalaluan=$_POST['katalaluan'];
    $nama=$_POST['nama'];
    $peranan=$_POST['peranan'];//perlu alert
    $notel=$_POST['notel'];

    $daftar="INSERT INTO pengguna (idpengguna,katalaluan,nama,peranan,notel) VALUES
    ('$idpengguna','$katalaluan','$nama','$peranan','$notel')";//jika ada ralat
    $hasil=mysqli_query($conn,$daftar);
        if ($hasil){
            echo"<script>alert('Pendaftaran berjaya.');window.location='login.php'</script>";
        }else{
            echo"<script>alert('Pendaftaran gagal.');window.location='daftar.php'</script>";
        }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="./koleksigurustyle.css?v=<?php echo time(); ?>">
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
                <li><a href="#lamanutamaguru.php"><i class="fas fa-info-circle"></i>Profil</a></li>
                <li><a href="#koleksikuiz.php"><i class="fab fa-wpforms"></i>Koleksi Kuiz</a></li>
                <li><a href="#prestasikuiz.php"><i class="fas fa-table"></i>Data Prestasi Kuiz Murid</a></li>
            </ul>
        </div>
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="login.php">Log Keluar</a></div>
            </div>
            <div class="maincontent">
                <div class="title">KOLEKSI KUIZ</div>
                <div class="separator"></div>
                <div class="detailbox">                     
                    <h3>
                    <?php
                    $dataA=mysqli_query($conn, "SELECT*FROM pengguna WHERE idpengguna='$idpengguna'");//sambung pada php di bahagian atas file ini
                    $infoA=mysqli_fetch_array($dataA);
                    ?>
                    <!-- output borang pendaftaran -->
                    <form class="registerform" action="" method="post">
                        <div class="forminput">
                            <input onblur="checkLength(this)" type="text"
                            name="idpengguna" placeholder="ID Pengguna" maxlength="5"
                            onkeypress='return event.charCode >=48 && event.charCode <=90' required autofocus/>
                            <i class="fas fa-address-card"></i>
                            <script>
                                function checkLength (e1){
                                    if (e1.value.length !=5){
                                        alert("ID Pengguna terdiri daripada satu abjad huruf besar dan empat digit.")
                                    }
                                }
                            </script>
                        </div>

                        <div class="forminput">
                            <input type="password" name="katalaluan" placeholder="Kata Laluan"
                            onkeypress='return event.charCode>=48 && event.charCode<=122' required>
                            <i class="fas fa-lock"></i>
                        </div>

                        <div class="forminput">
                            <input type="text" name="nama" placeholder="Nama Penuh"
                            onkeypress='return event.charCode==32 || event.charCode>=65 && event.charCode<=122' required>
                            <i class="fas fa-signature"></i>
                        </div>

                        <!-- perlu alert jika ada ralat -->
                        <div class="forminput">
                            <select class="peranan" name="peranan" required>
                            <!-- using an empty value attribute on the "placeholder" option-->
                            <!-- "disabled" option stops it from being selected with both mouse and keyboard-->
                            <!-- When the "select" element is required, it allows use of the ":invalid" CSS pseudo-class which allows you to style the "select" element when in its "placeholder" state-->
                            <!-- "hidden" element: the option is visible in dropdown, but it is not selectable-->
                            <option value="" disabled selected hidden>Peranan</option>
                            <option value="guru">Guru</option>
                            <option value="murid">Murid</option>
                            </select>
                            <i class="fas fa-user-alt"></i>
                        </div>

                        <div class="forminput">
                            <input type="text" name="notel" placeholder="No Telefon"
                            onkeypress='return event.charCode>=48 && event.charCode<=57' required>
                            <i class="fas fa-mobile-alt"></i>
                        </div>

                        <p class="notice"><br><em><b>Sila pastikan maklumat yang dimasukkan adalah betul sebelum melakukan pendaftaran.</em></b><br></p>

                        <div class="button">
                            <button class="submit" type="submit">Daftar</button>
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
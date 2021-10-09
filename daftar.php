<?php
//akan sambung kepada menu1.php
//wajib ada
require 'connect.php';
//post value yang nama sama dengan database
if(isset($_POST['idpengguna'])){
    $idpengguna=$_POST['idpengguna'];
    $katalaluan=$_POST['katalaluan'];
    $nama=$_POST['nama'];
    $peranan=$_POST['peranan'];
    $notel=$_POST['notel'];

    $daftar="INSERT INTO pengguna (idpengguna,katalaluan,nama,peranan,notel) VALUES
    ('$idpengguna','$katalaluan','$nama','$peranan','$notel')";
    $hasil=mysqli_query($conn,$daftar);
    if ($hasil){
        echo"<script>alert('Pendaftaran sebagai pengguna baharu berjaya.');window.location='login.php'</script>";
    }else{
        echo"<script>alert('Pendaftaran sebagai pengguna baharu gagal.');window.location='daftar.php'</script>";
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/daftarstyle.css?version=51">
    <title>Pendaftaran Pengguna Baharu</title>
</head>
<body>
    <div class="register-container">
    <style>
    body {
        height: auto;
        width: 100%;
        background-image: url(images/Daftar1.jpg);
        background-position: center;
        background-size: 100% 100%;
        background-attachment: fixed;
        position: absolute;
    }
    </style>
        <div class="form-box">
            <div class="title-box">
                <p class="title">PENDAFTARAN PENGGUNA BAHARU</p>
            </div>
            <div class="icon">
                <img src="images/Daftar2.png" alt="">
            </div>
            <!-- output borang pendaftaran -->
            <form class="registerform" action="" method="post">
                <div class="forminput">
                    <input onchange="checkLength(this)" type="text"
                    name="idpengguna" placeholder="ID Pengguna" maxlength="5"
                    onkeypress='return event.charCode==71 || event.charCode==77 || (event.charCode>=48 && event.charCode<=57)' required autofocus/>
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
                    <select class="peranan" id="peranan" name="peranan" required>
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
                    <input type="text" name="notel" placeholder="No Telefon" maxlength="12"
                    onkeypress='return event.charCode>=48 && event.charCode<=57' required>
                    <i class="fas fa-mobile-alt"></i>
                </div>

                <p class="notice"><br><em><b>Sila pastikan maklumat yang dimasukkan adalah betul sebelum melakukan pendaftaran.</em></b><br></p>
                
                <div class="button">
                    <button class="submit" type="submit">Daftar</button>
                    <button class="reset" type="reset">Reset</button>
                </div>
                <br><br>
                <p class="balik"><a href="login.php">Klik sini untuk kembali ke halaman login</a></p>
            </form>
        </div>
    </div>
</body>
</html>
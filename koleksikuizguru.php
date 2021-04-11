<?php
require'connect.php';
require'keselamatan.php';
//perlu sama dengan database table pengguna
$idpengguna=$_SESSION['idpengguna'];
//post value yang nama sama dengan database
if(isset($_POST['idpengguna'])){
    $soal=$_POST['soal'];
    $plhjwp=$_POST['plhjwp'];

    //papar koleksi kuiz
    $dataA=mysqli_query($conn, "SELECT*FROM topik WHERE idpengguna='$idpengguna'");//sambung pada php di bahagian atas file ini
    $infoA=mysqli_fetch_array($dataA);

    if (isset($_POST['search']['value'])){
        $dataA .= 'idtopik LIKE "%'
        .$_POST["search"]["value"].'%"';

        $dataA .= 'OR topik LIKE "%'
        .$_POST["search"]["value"].'%"';

        $dataA .= 'OR jumsoal LIKE "%'
        .$_POST["search"]["value"].'%"';
    }

    $dataA .= ')';

    if (isset($_POST['idpengguna'])){
        $idpengguna = $_POST['idpengguna'];
        $katalaluan = $_POST['katalaluan'];
        //nama mesti sama dengan $conn di connect.php
        $query = mysqli_query($conn, "SELECT* FROM pengguna WHERE idpengguna='$idpengguna' AND katalaluan='$katalaluan' AND idpengguna LIKE 'G%'");
        $row = mysqli_fetch_assoc($query);
        //perlu sama dengan post
        if (mysqli_num_rows($query)==0||$row['katalaluan']!=$katalaluan){
            echo"<script>alert('Minta maaf, ID Pengguna atau kata laluan anda salah.');
            window.location='login.php'</script>";
        }else{
            $_SESSION['idpengguna']=$row['idpengguna'];
            //akan bawa ke lamanutamaguru.php
            $_SESSION['level']=$row['peranan'];
            header ("Location: lamanutamaguru.php");
        }
    }

    $daftarsoalan="INSERT INTO soalan (soal) VALUES
    ('$soal','$katalaluan')";//jika ada ralat
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
    <link rel="stylesheet" href="./koleksikuizgurustyle.css?v=<?php echo time(); ?>">
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
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
            <div class="maincontent">
                <div class="title">KOLEKSI KUIZ</div>
                <div class="separator"></div>
                <div class="detailbox">                     
                    <!-- output koleksi kuiz -->
                    <table id="koleksikuiz" class="koleksi kuiz">
                        <thead>
                            <tr>
                                <th>Id Topik</th>
                                <th>Topik</th>
                                <th>Jumlah Soalan</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                    </table>
                    <script>
                        $(document).ready(function(){
                            var tabledata = $('koleksikuiz').tabledata();
                                "processing": true,
                                //enable processing mode
                                "serverSide": true,
                                //initial remove table order from table
                                "order": [],
                                "xampp": {
                                    url: "xamppaction.php",
                                    method:"POST",
                                    data:{action:'fetch', page:'topik'}
                                },
                                //column definition initialization properties
                                "columnDef" : [
                                    {
                                    "target" : [4],
                                    //remove default table sorting feature from column
                                    "orderable" :false;

                                    }
                                ],
                            });
                    </script>

                    <div class="button">
                        <button class="submit" type="submit">Daftar Soalan</button>
                        <button class="reset" type="reset">Reset</button>
                    </div>                     
                </div>                 
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
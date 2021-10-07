<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="css/prestasitopikstyle.css?v=<?php echo time(); ?>">
    <script src="jquery_library.js"></script>
    <script src="bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".searchbutton").click(function(){
                $(this).toggleClass("bg-aquavelvet");
                $(".fas").toggleClass("color-white");
                //focus method in input element to achieve the blinking effect in the input field
                //.val('') is to clear the input field and a value
                $(".searchinput").focus().toggleClass("active-width").val('');
            });
        });
    </script>
    <title>Prestasi Topik</title>
</head>
    <!-- header mula -->
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
    <!-- header tamat -->
            <div class="maincontent">
                <div class="title">PRESTASI MURID BERDASARKAN TOPIK</div>
                <div class="separator"></div>
                <div class="detailbox">
                    <?php
                        //output prestasi topik
                        $tambah = "SELECT * FROM topik";
                        $hasil = mysqli_query($conn,$tambah);                       
                        ?>
                        <div class="searchbox">
                            <input type="text" name="search" id="search" class="searchinput" placeholder="Cari..." spellcheck="false">
                            <div class="searchbutton">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                        <table class="prestasi" id="prestasitopik" autowidth="false">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">Bil.</th>
                                    <th style="width: 50%;">Topik</th>
                                    <th style="width: 20%;">Bil. Menjawab</th>
                                    <th style="width: 20%;">Laporan Lengkap</th>
                                </tr>
                            </thead>
                            <?php
                                $jumlah = 1;
                                $topik=mysqli_query($conn, "SELECT * FROM topik");
                                //while loop untuk memastikan semua data dipaparkan
                                while($infotopik = mysqli_fetch_array($topik)){
                                    //sambung ke entiti soalan
                                    $rekod=mysqli_query($conn, "SELECT idtopik,COUNT(idtopik) as 'bil' FROM perekodan WHERE idtopik='$infotopik[idtopik]'");
                                    $infobiljawab=mysqli_fetch_array($rekod);
                            ?>
                            <!-- masukkan data ke dalam lajur yang ditetapkan -->
                            <tbody>
                                <tr>
                                    <td><?php echo $jumlah++;?></td>
                                    <td><?php echo $infotopik['topik'];?></td>
                                    <td><?php echo $infobiljawab['bil'];?></td>
                                    <td>
                                        <a href="laporanprestasitopikguru.php?idtopik=<?php echo $infotopik['idtopik']; ?>" class="laporan">Buka Laporan</a>
                                    </td>
                                </tr>
                            </tbody>
                                <?php } ?>
                        </table>
                        <br><br>Jumlah Rekod: <?php echo $jumlah-1;?><br>
                    </div>
            </div>
        </div>
</body>
</html>

<script>
    $(document).ready(function(){
        $('#search').keyup(function(){
            search_table($(this).val());
        });

        function search_table(value){
            $('#prestasitopik tbody').each(function(){
                var found = 'false';
                $(this).each(function(){
                    if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0){
                        found = 'true';
                    }
                });
                if(found == 'true'){
                    $(this).show();
                }
                else{
                    $(this).hide();
                }
            });
        }
    });
</script>
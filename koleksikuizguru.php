<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');

$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="css/koleksikuizgurustyle.css?v=<?php echo time(); ?>">
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
    <title>Koleksi Kuiz Guru</title>
</head>
    <!-- header mula -->
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
    <!-- header tamat -->
            <div class="maincontent">
                <div class="title">KOLEKSI KUIZ</div>
                <div class="tambahkuiz"><a href="tambahkuiz.php">Tambah Topik</a></div>
                <div class="separator"></div>
                <div class="detailbox">
                    <!-- output koleksi kuiz -->  
                    <?php
                        //output butiran topik
                        $tambah = "SELECT * FROM topik";
                        $hasil = mysqli_query($conn,$tambah);                       
                        ?>
                        <div class="searchbox">
                            <input type="text" name="search" id="search" class="searchinput" placeholder="Cari..." spellcheck="false">
                            <div class="searchbutton">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                        <table class="koleksikuiz" id="koleksikuiz" autowidth="false">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">Bil.</th>
                                    <th style="width: 45%;">Topik</th>
                                    <th style="width: 25%;">Pengurusan Topik</th>
                                    <th style="width: 25%;">Pengurusan Soalan</th>
                                </tr>
                            </thead>
                            <?php
                                if($hasil==TRUE){
                                    //ambil semua rows
                                    $bil = 1;
                                    $count = mysqli_num_rows($hasil);
                                    if($count>0){
                                        //output semua butiran
                                        //while loop untuk memastikan semua data dipaparkan
                                        while($rows = mysqli_fetch_assoc($hasil)): ?>
                                            
                                        <!-- papar dalam bentuk jadual -->
                                        <tbody>
                                            <tr>
                                                <td><?php echo $bil++;?></td>
                                                <td><?php echo $rows['topik'];?></td>
                                                <td>
                                                    <a href="kemaskinitopik.php?idtopik=<?php echo $rows['idtopik']; ?>" class="kemaskinikuiz">Kemas Kini</a>
                                                    <a href="hapuskantopik.php?idtopik=<?php echo $rows['idtopik']; ?>" class="hapuskuiz" onclick="return confirm('Adakah anda ingin menghapuskan topik ini?')">Hapuskan</a>
                                                </td>
                                                <td>
                                                    <a href="koleksisoalankuiz.php?idtopik=<?php echo $rows['idtopik']; ?>" class="koleksisoalankuiz"><i class="fas fa-eye"></i></a>
                                                    <a href="tambahsoalan.php?idtopik=<?php echo $rows['idtopik']; ?>" class="tambahsoalan">Tambah</a>
                                                </td>
                                            </tr>                                          
                                        </tbody>
                                        <?php endwhile; }} ?>
                        </table>
                        <br><br>Jumlah Rekod: <?php echo $bil-1;?><br>
                        <?php
                            function pre_r($array){
                                echo '<pre>';
                                print_r($array);
                                echo '</pre>';
                            }
                        ?>
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
            $('#koleksikuiz tbody').each(function(){
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
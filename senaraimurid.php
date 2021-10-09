<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
?>

<head>
    <link rel="stylesheet" href="css/senaraimuridstyle.css?v=<?php echo time(); ?>">
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
    <title>Senarai Murid</title>
</head>
    <!-- header mula -->
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
    <!-- header tamat -->
            <div class="maincontent">
                <div class="title">SENARAI MURID BERDAFTAR</div>
                <a name="cetak" onclick="window.print()">CETAK</a>
                <div class="separator"></div>
                <div class="detailbox">    
                    <!-- output senarai murid -->
                    <?php
                        //output butiran topik
                        $querymurid = mysqli_query($conn, "SELECT * FROM pengguna WHERE peranan='murid' ORDER BY nama ASC");
                        ?>
                        <div class="searchbox">
                            <input type="text" name="search" id="search" class="searchinput" placeholder="Cari..." spellcheck="false">
                            <div class="searchbutton">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                        <table class="senaraimurid" id="senaraimurid" autowidth="false">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">Bil.</th>
                                    <th style="width: 35%;">Nama Murid</th>
                                    <th style="width: 15%;">ID Pengguna</th>
                                    <th style="width: 15%;">Kata Laluan</th>
                                    <th style="width: 15%;">No Telefon</th>
                                    <th style="width: 15%;">Tindakan</th>
                                </tr>
                            </thead>
                            <?php
                                if($querymurid==TRUE){
                                    //ambil semua rows
                                    $count = mysqli_num_rows($querymurid);
                                    if($count>0){
                                        //output semua butiran
                                        $bil = 1;
                                        //while loop untuk memastikan semua data dipaparkan
                                        while($fetchmurid = mysqli_fetch_assoc($querymurid)): ?>
                                            
                                        <!-- papar dalam bentuk jadual -->
                                        <tbody>
                                            <tr>
                                                <td><?php echo $bil++;?></td>
                                                <td><?php echo $fetchmurid['nama'];?></td>
                                                <td><?php echo $fetchmurid['idpengguna'];?></td>
                                                <td><?php echo $fetchmurid['katalaluan'];?></td>
                                                <td><?php echo $fetchmurid['notel'];?></td>
                                                <td>
                                                    <a href="hapuskanmurid.php?idpengguna=<?php echo $fetchmurid['idpengguna']; ?>" class="hapusmurid" onclick="return confirm('Adakah anda ingin hapuskan semua rekod murid ini?')">Hapuskan</a>
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
            $('#senaraimurid tbody').each(function(){
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
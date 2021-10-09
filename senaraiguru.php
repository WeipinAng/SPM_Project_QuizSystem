<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
?>

<head>
    <link rel="stylesheet" href="css/senaraigurustyle.css?v=<?php echo time(); ?>">
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
    <title>Senarai Guru</title>
</head>
    <!-- header mula -->
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
    <!-- header tamat -->
            <div class="maincontent">
                <div class="title">SENARAI GURU BERDAFTAR</div>
                <a name="cetak" onclick="window.print()">CETAK</a>
                <div class="separator"></div>
                <div class="detailbox">                     
                    <!-- output senarai guru -->
                    <div class="searchbox">
                            <input type="text" name="search" id="search" class="searchinput" placeholder="Cari..." spellcheck="false">
                            <div class="searchbutton">
                                <i class="fas fa-search"></i>
                            </div>
                    </div>
                    <table class="senaraiguru" id="senaraiguru" autowidth="false">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Bil.</th>
                                <th style="width: 40%;">Nama Guru</th>
                                <th style="width: 20%;">ID Pengguna</th>
                                <th style="width: 15%;">Bil. Topik</th>
                                <th style="width: 15%;">Tindakan</th>
                            </tr>
                        </thead>
                    <?php
                        $bil = 1;
                        //output senarai guru mengikut susunan ASC
                        $queryguru = mysqli_query($conn,"SELECT * FROM pengguna WHERE peranan='guru' ORDER BY nama ASC");
                        while($fetchguru = mysqli_fetch_assoc($queryguru)){
                            //sambung ke entiti topik
                            $topik = mysqli_query($conn,"SELECT idtopik, COUNT(idtopik) as 'biltopik' FROM topik WHERE idpengguna='$fetchguru[idpengguna]' GROUP BY idpengguna");
                            $datatopik = mysqli_fetch_assoc($topik);
                            $bildatatopik = mysqli_num_rows($topik);
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $bil;?></td>
                                <td><?php echo $fetchguru['nama'];?></td>
                                <td><?php echo $fetchguru['idpengguna'];?></td>
                                <td><?php
                                if($bildatatopik==0){
                                    echo 0;
                                } else {
                                    echo $datatopik['biltopik'];
                                } ?></td>
                                <td>
                                    <a href="hapuskanguru.php?idpengguna=<?php echo $fetchguru['idpengguna']; ?>" class="hapusguru" onclick="return confirm('Adakah anda ingin hapuskan semua rekod guru ini?')">Hapuskan</a>
                                </td>
                            </tr>
                        </tbody>
                        <?php $bil++; } ?>
                    </table>
                    <br><br>Jumlah Rekod: <?php echo $bil-1;?><br>
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
            $('#senaraiguru tbody').each(function(){
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
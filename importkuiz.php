<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="css/importkuiz.css?v=<?php echo time(); ?>">
    <title>Laman Utama</title>
</head>
    <!-- header mula -->
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
    <!-- header tamat -->
            <div class="maincontent">
                <div class="title">IMPORT NAMA PELAJAR DARI FAIL CSV</div>
                <div class="separator"></div>
                <div class="detailbox">
                    <h3>
                    <form class="uploadform" action="prosesimportkuiz.php" method="post" name="upload_excel" enctype="multipart/form-data">
                        <div class="forminput">
                            <p style="font-size: 14px">Kemudahan untuk mendaftar nama murid secara berkelompok</p><br>
                            <p style="font-size: 14px">Pilih lokasi fail dalam bentuk CSV/Excel:</p>
                        </div>
                        <!-- Memanggil Fail CSV untuk melaksanakan arahan IMPORT -->
                        <form action="importcsv.php" method="post" name="daftarmurid" enctype="multipart/form-data">
                            <input type="file" id="actual-btn" hidden/>
                            <label for="actual-btn">Pilih Fail CSV</label>
                            <span id="filechosen">No file chosen</span>
                            <script>
                                const actualBtn = document.getElementById('actual-btn');
                                const fileChosen = document.getElementById('filechosen');
                                actualBtn.addEventListener('change', function(){
                                    fileChosen.textContent = this.files[0].name
                                })
                            </script>
                            <button class="submit" type="submit" id="submit" name="import">Muat Naik</button>
                        </form>
                        <br>
                        <p style="font-size: 13px">Sila mencipta fail dalam Microsoft Excel dan simpan fail dalam bentuk CSV mengikut aturan lajur seperti di bawah:</p>
                        <br><br>
                        <table class="import" autowidth="false">
                            <tr style="font-size: 14px">
                                <th style="width: 30%;">Nama Murid</th>
                                <th style="width: 15%;">ID Pengguna</th>
                                <th style="width: 30%;">Kata Laluan</th>
                                <th style="width: 25%;">No. Telefon</th>
                            </tr>
                            <tr style="font-size: 14px">
                                <td>Abdul Rahim bin Ahmad</td>
                                <td>M0001</td>
                                <td>rahim2004</td>
                                <td>0193784789</td>
                            </tr>
                        </table>
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
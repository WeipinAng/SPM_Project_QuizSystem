<?php
require 'connect.php';
require 'keselamatan.php';
include('template/sidebar.php');
$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="css/tambahsoalanstyle.css?v=<?php echo time(); ?>">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
            <div class="maincontent">
                <div class="title">TAMBAH SOALAN BAHARU</div>
                <div class="balik"><a href="koleksikuizguru.php">Balik</a></div>
                <div class="separator"></div>
                <div class="detailbox">                   
                    <h3>
                    <!-- output borang pendaftaran -->
                    <form id="formsoalan" name="question" class="quizform" action="prosestambahsoalan.php" method="post" spellcheck="false">
                        <div id="forminputsoalan" class="forminputsoalan">
                            <input class="soalan" type="text" name="soal" placeholder="Soalan"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required></input>
                        </div>

                        <div class="forminput">
                            <input type="text" name="plhjwp" placeholder="Pilihan 1"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required>
                            <p>A</p>
                        </div>

                        <div class="forminput2">
                            <input type="text" name="plhjwp" placeholder="Pilihan 2"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required>
                            <p>B</p>
                        </div>

                        <div class="forminput">
                            <input type="text" name="plhjwp" placeholder="Pilihan 3"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required>
                            <p>C</p>
                        </div>

                        <div class="forminput2">
                            <input type="text" name="plhjwp" placeholder="Pilihan 4"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required>
                            <p>D</p>
                        </div>

                        <div class="forminput">
                            <select class="jawapan" name="jwp" required>
                            <!-- using an empty value attribute on the "placeholder" option-->
                            <!-- "disabled" option stops it from being selected with both mouse and keyboard-->
                            <!-- When the "select" element is required, it allows use of the ":invalid" CSS pseudo-class which allows you to style the "select" element when in its "placeholder" state-->
                            <!-- "hidden" element: the option is visible in dropdown, but it is not selectable-->
                            <option value="" disabled selected hidden>Jawapan</option>
                            <option value="A">Jawapan: A</option>
                            <option value="B">Jawapan: B</option>
                            <option value="C">Jawapan: C</option>
                            <option value="D">Jawapan: D</option>
                            </select>
                        </div>

                        <div id="tambahform"></div>
                        <button id="tambahform" class="tambahform" type="button">Tambah Soalan</button>
                        <button id="hapusform" class="hapusform" type="button">Hapus</button>

                        <div class="button">
                            <button class="submit" type="submit">Daftar Soalan</button>
                            <button class="reset" type="reset">Reset</button>
                        </div>
                    </form>
                    
                    <script type="text/javascript">
                        // tambah form
                        $("#tambahform").click(function (){
                            var html = '';
                            
                            html += '<div id="forminputsoalan" class="forminputsoalan">';
                            html += '<input class="soalan" type="text" name="soal" placeholder="Soalan" onkeypress='return event.charCode>=32 && event.charCode<=125' required></input>';
                            html += '</div>';
                            html += '<div class="forminput">';
                            html += '<input type="text" name="plhjwp" placeholder="Pilihan 1" onkeypress='return event.charCode>=32 && event.charCode<=125' required>';
                            html += '<p>A</p>';
                            html += '</div>';
                            html += '<div class="forminput2">';
                            html += '<input type="text" name="plhjwp" placeholder="Pilihan 2" onkeypress='return event.charCode>=32 && event.charCode<=125' required>';
                            html += '<p>B</p>';
                            html += '</div>';
                            html += '<div class="forminput">';
                            html += '<input type="text" name="plhjwp" placeholder="Pilihan 3" onkeypress='return event.charCode>=32 && event.charCode<=125' required>';
                            html += '<p>C</p>';
                            html += '</div>';
                            html += '<div class="forminput2">';
                            html += '<input type="text" name="plhjwp" placeholder="Pilihan 4" onkeypress='return event.charCode>=32 && event.charCode<=125' required>';
                            html += '<p>D</p>';
                            html += '</div>';
                            html += '<div class="forminput">';
                            html += '<select class="jawapan" name="jwp" required>';
                            html += '<option value="" disabled selected hidden>Jawapan</option>';
                            html += '<option value="A">Jawapan: A</option>';
                            html += '<option value="B">Jawapan: B</option>';
                            html += '<option value="C">Jawapan: C</option>';
                            html += '<option value="D">Jawapan: D</option>';
                            html += '</select>';
                            html += '</div>';

                            $('#tambahform').append(html);
                        });

                        // hapus form
                        $(document).on('click', '#hapusform', function () {
                            $(this).closest('#forminputsoalan').remove();
                        });
                    </script>

                    </h3>
                </div>                 
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
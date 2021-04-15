<?php
require'connect.php';
require'keselamatan.php';
include('template/sidebarguru.php');
$idpengguna=$_SESSION['idpengguna'];
?>

<head>
    <link rel="stylesheet" href="tambahsoalanstyle.css?v=<?php echo time(); ?>">
</head>
        <div class="space">
            <div class="header">
                <h2>Sistem Penilaian Kuiz Bahasa Melayu Tingkatan 4</h2>
                <div class="logoutbutton"><a href="logout.php">Log Keluar</a></div>
            </div>
            <div class="maincontent">
                <div class="title">TAMBAH SOALAN BAHARU</div>
                <div class="separator"></div>
                <div class="detailbox">                     
                    <h3>
                    <!-- output borang pendaftaran -->
                    <form class="quizform" action="" method="post" spellcheck="false">
                        <div class="forminputsoalan">
                            <input class="soalan" type="text" name="soal" placeholder="Soalan"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required></input>
                        </div>

                        <div class="forminput">
                            <input type="text" name="plhjwp" placeholder="Pilihan 1"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required>
                            <p>A</p>
                        </div>

                        <div class="forminput">
                            <input type="text" name="plhjwp" placeholder="Pilihan 2"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required>
                            <p>B</p>
                        </div>

                        <div class="forminput">
                            <input type="text" name="plhjwp" placeholder="Pilihan 3"
                            onkeypress='return event.charCode>=32 && event.charCode<=125' required>
                            <p>C</p>
                        </div>

                        <div class="forminput">
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
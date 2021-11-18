<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/loginstyle.css">
    <title>Log Masuk Pengguna</title>
</head>
<body>
    <section class="side">
        <img src="images/Log Masuk 1.jpg" alt="">
    </section>

    <section class="main">
        <div class="login-container">
            <p class="title">Selamat datang ke</p><br>
            <p class="title">SISTEM PENILAIAN KUIZ BAHASA MELAYU TINGKATAN 4</p>
            <div class="separator"></div>
            <p class="message">Sila masukkan butiran anda untuk teruskan.</p>

            <form class="loginform" action="proseslogin.php" method="post">
                <div class="forminput">
                    <!-- perlu sama dengan primary key database dalam table pengguna -->
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
                    <!-- perlu sama dengan katalaluan database dalam table pengguna -->
                    <input type="password" name="katalaluan" placeholder="Kata Laluan"
                    onkeypress='return 48<=event.charCode<=57 && 65<=event.charCode<=122' required>
                    <i class="fas fa-lock"></i>
                </div>

                <div class="button">
                    <button class="submit" type="submit">Log Masuk</button>
                    <button class="reset" type="reset">Reset</button>
                </div>

                <div class="register">
                    <br>Masih belum berdaftar? <a href="daftar.php">Daftar di sini</a></h5></br>
                    <br><em>Jika anda merupakan admin, sila terus log masuk dengan idpengguna dan kata laluan yang telah ditetapkan.</em>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
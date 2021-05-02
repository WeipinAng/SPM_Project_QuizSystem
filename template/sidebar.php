<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="template/sidebar.css?v=<?php echo time(); ?>">
    <title>Laman Utama</title>
</head>

<?php
if ($_SESSION['level']=="ADMIN"){
?>
<body>
    <!-- sidebar untuk admin mula -->
    <div class="wrapper">
        <div class="dashboard">
            <h2>Laman Utama</h2>
            <div class="icon">
                <img src="images/Guru.png" alt="">
            </div>
            <h5><center>Guru</center></h5>
            <ul>
                <li><a href="lamanutamaguru.php"><i class="fas fa-info-circle"></i>Profil</a></li>
                <li><a href="koleksikuizguru.php"><i class="fab fa-table"></i>Senarai Guru</a></li>
                <li><a href="prestasikuiz.php"><i class="fas fa-table"></i>Senarai Murid</a></li>
                <li><a href="prestasikuiz.php"><i class="fas fa-file-database"></i>Statistik</a></li>
            </ul>
        </div>
    <!-- sidebar untuk admin tamat -->

<?php
} else if($_SESSION['level']=="GURU") {
?>
<body>
    <!-- sidebar untuk guru mula -->
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
                <li><a href="prestasikuiz.php"><i class="fas fa-table"></i>Data Prestasi</a></li>
                <li><a href="prestasikuiz.php"><i class="fas fa-file-import"></i>Import</a></li>
            </ul>
        </div>
    <!-- sidebar untuk guru tamat -->

<?php
} else {
?>
<body>
    <!-- sidebar untuk murid mula -->
    <div class="wrapper">
        <div class="dashboard">
            <h2>Laman Utama</h2>
            <div class="icon">
                <img src="images/Daftar2.png" alt="">
            </div>
            <h5><center>Murid</center></h5>
            <ul>
                <li><a href="lamanutamamurid.php"><i class="fas fa-info-circle"></i>Profil</a></li>
                <li><a href="koleksikuizmurid.php"><i class="fab fa-wpforms"></i>Koleksi Kuiz</a></li>
                <li><a href="prestasikuiz.php"><i class="fas fa-table"></i>Prestasi</a></li>
            </ul>
        </div>
    <!-- sidebar untuk murid tamat -->
<?php
}
?>
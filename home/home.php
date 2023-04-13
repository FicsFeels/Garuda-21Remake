<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Garuda-21 Remake</title>
	<link rel="stylesheet" type="text/css" href="home.css">
    <script src="https://unpkg.com/feather-icons"></script>

</head>
<body>
    <nav class="navbar">
        <div class="nav-extra">
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
            <img src="Image1/Logo.jpg"/>
        </div>
        <script>
            feather.replace()
        </script>
        
        <div class="nav-side">
            <a href="#" class="active">Beranda</a>
            <a href="jadwal.php">Jadwal</a>
            <a href="ujian.php">Ujian</a>
            <a href="tugas.php">Tugas</a>
            <a href="jurnal.php">Jurnal Literasi</a>
        </div>

        <div class="navbar-nav">
            <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
            <a class="cta" href="../Login/Logout.php">Logout</a>
        </div>
    </nav>
    <section class="parallax">
        <div class="title">
            <h2 id="text">Garuda-21 <span>Remake</span></h2><br>
            <h2 id="sub">Nature Edition</h2>
        </div>
    </section>
    <section class="sec">
        <h2>Fitur</h2>
        <div class="boxes">
            <div class="box">
                <i class="i" data-feather="calendar"></i>
                <a href="jadwal.php">Jadwal Pembelajaran</a>
            </div>
            <div class="box">
                <i class="i" data-feather="check-circle"></i>
                <a href="ujian.php">Ujian</a>
            </div>
            <div class="box">
                <i class="i" data-feather="clipboard"></i>
                <a href="tugas.php">Tugas</a>
            </div>
            <div class="box">
                <i class="i" data-feather="book-open"></i>
                <a href="jurnal.php">Jurnal Literasi</a>
            </div>
        </div>
        <script>
            feather.replace()
        </script>
    </section>
    <section class="tentang">
        <div class="about">
            <h2 class="pembuka">Tentang Web</h2>
            <p>GARUDA-21 merupakan akronim dari  GERAKKAN ANAK CERDAS INDONESIA Abad 21. Sebuah sistem pembeljaran kekinian sehingga membuat meeting/
                 webinar bisa langsung dibuat di aplikasi ini tanpa perlu masuk ke Microsoft Teams.
                Nama GARUDA-21 menggunakan logo Burung Garuda sebagai kode produk dengan filosofi bahwa burung Garuda 
                ini bisa menjelajah ke berbagai penjuru negeri, baik dengan kondisi internet bagus atau daerah dengan kondisi internet yang sulit.</p><br>
            <p>Ini adalah versi Remake Garuda-21 yang dibuat oleh kelompok 6</p><br><br>
            <p>&copy;Feels 2023 - <script>document.write(new Date().getFullYear())</script></p>
        </div>
    </section>
    
    <script src="../js/script.js"></script>
 
    
   
</body>
</html>

<?php 
}else{
     header("Location:index.php");
     exit();
}
 ?>
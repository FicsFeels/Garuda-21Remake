<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ujian</title>
	<link rel="stylesheet" type="text/css" href="tugas.css">
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
            <a href="home.php" >Beranda</a>
            <a href="jadwal.php">Jadwal</a>
            <a href="#"class="active">Ujian</a>
            <a href="tugas.php">Tugas</a>
            <a href="jurnal.php">Jurnal Literasi</a>
        </div>

        <div class="navbar-nav">
            <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
            <a class="cta" href="../Login/Logout.php">Logout</a>
        </div>
    </nav>
    <h1 class="judul">Ujian</h1>
    <table>
      <thead>
        <tr>
          <td>No</td>
          <td>Mapel</td>
          <td>Bab</td>
          <td>Jumlah soal</td>
          <td>Link Pengerjaan</td>
          <td></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Komunikasi</td>
          <td>Telekomunikasi</td>
          <td>30</td>
          <td>https://quizizz.com/join?gc=61498319</td>
          <td><a href="https://quizizz.com/join?gc=61498319">Kerjakan</a></td>
        </tr>
        <tr>
          <td>2</td>
          <td>Matematika</td>
          <td>Algoritma</td>
          <td>20</td>
          <td>https://quizizz.com/join?gc=11363279</td>
          <td><a href="https://quizizz.com/join?gc=11363279">Kerjakan</a></td>
        </tr>
      </tbody>
    </table>
    
  <script src="../js/script.js"></script>
</body>
</html>

<?php 
}else{
     header("Location:index.php");
     exit();
}
 ?>
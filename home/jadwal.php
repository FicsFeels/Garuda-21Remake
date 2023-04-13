<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Jadwal</title>
	<link rel="stylesheet" type="text/css" href="jadwal.css">
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
            <a href="#"class="active">Jadwal</a>
            <a href="ujian.php">Ujian</a>
            <a href="tugas.php">Tugas</a>
            <a href="jurnal.php">Jurnal Literasi</a>
        </div>

        <div class="navbar-nav">
            <h1>Selamat datang, <?php echo $_SESSION['name']; ?></h1>
            <a class="cta" href="../Login/Logout.php">Logout</a>
        </div>
    </nav>
    <i data-feather="book">
    <script src="../js/script.js"></script>
    <h1 class="judul">Jadwal Pembelajaran</h1>
    <table>
  <thead>
    <tr>
      <th></th>
      <th>1</th>
      <th>2</th>
      <th>3</th>
      <th>4</th>
      <th>5</th>
      <th>6</th>
      <th>7</th>
      <th>8</th>
      <th>9</th>
      <th>10</th>
      
      
    </tr>
  </thead>
  <tbody>
    <tr>
    </tr>
    <tr>
      <td>Senin</td>
      <td colspan="3">PA-BP</td>
      <td>TIK</td>
      <td>Geografi</td>
      <td>Sosiologi</td>
      <td colspan="2">Matematika</td>
      <td colspan="2">Sejarah</td>
    </tr>
    <tr>
      <td>Selasa</td>
      <td  colspan="2">PPKn</td>
      <td colspan="2">Bahasa Indonesia</td>
      <td colspan="2">Bahasa Inggris</td>
      <td colspan="2">Matematika</td>
      <td colspan="2">Ekonomi</td>
    </tr>
    <tr>
      <td>Rabu</td>
      <td colspan="2">Bahasa Jawa</td>
      <td>BK</td>
      <td colspan="3">PJOK</td>
      <td colspan="2">Seni</td>
      <td colspan="2">Sosiologi</td>
    </tr>
    <tr>
      <td>Kamis</td>
      <td colspan="3">Fisika</td>
      <td colspan="2">Geografi</td>
      <td colspan="3">Kimia</td>
      <td colspan="2">Bahasa Idonesia</td>
    </tr>
    <tr>
      <td>Jumat</td>
      <td colspan="2">TIK</td>
      <td colspan="3">Biologi</td>
      <td>Ekonomi</td>
      <td>Sejarah</td>
    </tr>
  </tbody>
</table>
 
    
   
</body>
</html>

<?php 
}else{
     header("Location:index.php");
     exit();
}
 ?>
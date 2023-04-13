<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Jurnal Literasi</title>
	<link rel="stylesheet" type="text/css" href="jurnal.css">
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
            <a href="ujian.php">Ujian</a>
            <a href="tugas.php">Tugas</a>
            <a href="#"class="active">Jurnal Literasi</a>
        </div>

        <div class="navbar-nav">
            <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
            <a class="cta" href="../Login/Logout.php">Logout</a>
        </div>
    </nav>
    <script src="../js/script.js"></script>

</body>
<?php 
}else{
     header("Location:index.php");
     exit();
}
 ?>
 <?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;


// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM kontak ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Get the total number of contacts, this is so we can determine whether there should be a next and previous button
$num_contacts = $pdo->query('SELECT COUNT(*) FROM kontak')->fetchColumn();
?>




<div class="read">
	<h1 class="Judul">Jurnal Literasi</h1>
	<a href="create.php" class="create">Tambahkan catatan</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nama</td>
                <td>Judul Buku</td>
                <td>Pengarang</td>
                <td>Ringkasan Singkat</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['id']?></td>
                <td><?=$contact['nama']?></td>
                <td><?=$contact['email']?></td>
                <td><?=$contact['notelp']?></td>
                <td><?=$contact['pekerjaan']?></td>
                <td class="actions">
                    <a href="update.php?id=<?=$contact['id']?>" class="edit"><i data-feather="file-text"></i></a>
                    <a href="delete.php?id=<?=$contact['id']?>" class="trash"><i data-feather="trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
      feather.replace()
    </script>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_contacts): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>


<?=template_footer()?>
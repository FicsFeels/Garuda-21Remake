<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $notelp = isset($_POST['notelp']) ? $_POST['notelp'] : '';
    $pekerjaan = isset($_POST['pekerjaan']) ? $_POST['pekerjaan'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO kontak VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $nama, $email, $notelp, $pekerjaan]);
    // Output message
    $msg = 'Catatan berhasil ditambahkan';
}
?>
<link rel="stylesheet" href="create.css">
<title>Buat Catatan</title>

<div class="content update">
	<h2>Buat Catatan</h2>
    <form action="create.php" method="post">
        <label for="id">No</label>
        <input type="text" name="id" id="id">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama">
        <label for="email">Judul Buku</label>
        <input type="text" name="email" id="email">
        <label for="notelp">Pengarang</label>
        <input type="text" name="notelp" id="notelp">
        <label for="pekerjaan">Ringkasan Singkat</label>
        <input type="text" name="pekerjaan" id="pekerjaan">
        <input type="submit" value="Buat">
        <a href="jurnal.php">Kembali</a>
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>
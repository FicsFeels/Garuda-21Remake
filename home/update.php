<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $notelp = isset($_POST['notelp']) ? $_POST['notelp'] : '';
        $pekerjaan = isset($_POST['pekerjaan']) ? $_POST['pekerjaan'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE kontak SET id = ?, nama = ?, email = ?, notelp = ?, pekerjaan = ? WHERE id = ?');
        $stmt->execute([$id, $nama, $email, $notelp, $pekerjaan, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM kontak WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>
<title>Perbarui Catatan</title>
<link rel="stylesheet" href="create.css">

<div class="content update">
	<h2>Perbaarui Catatan#<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" value="<?=$contact['id']?>" id="id">
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?=$contact['nama']?>" id="nama">
        <label for="email">Judul </label>
        <input type="text" name="email" value="<?=$contact['email']?>" id="email">
        <label for="notelp">Pengarang</label>
        <input type="text" name="notelp" value="<?=$contact['notelp']?>" id="notelp">
        <label for="pekerjaan">Ringkasan Singkat</label>
        <input type="text" name="pekerjaan" value="<?=$contact['pekerjaan']?>" id="title">
        <input type="submit" value="Perbarui">
        <a href="jurnal.php">Kembali</a>
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>
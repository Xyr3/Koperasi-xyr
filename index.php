<?php 
require_once "database.php";
require_once "produk.php";

$db = new Database();
$produk = new Produk($db->getConnection());
$data = $produk->semua();
?>
<h2>Koperasi Sekolah</h2>
<form method="get" action="">
    <input type="text" name="kata" placeholder="Cari nama produk..." value="<?= htmlspecialchars($_GET['kata'] ?? '') ?>">
    <button type="submit">Cari</button>
    <?php if (isset($_GET['kata'])): ?>
        <a href="index.php">Reset</a>
    <?php endif; ?>
</form>
<a href="tambah.php">+ Tambah Produk</a>
<table border="1" cellpadding="6">
 <tr><th>ID</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr>
 <?php foreach ($data as $p): ?>
 <tr>
 <td><?= $p['id'] ?></td>
 <td><?= htmlspecialchars($p['nama']) ?></td>
 <td>Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
 <td><?= $p['stok'] ?></td>
 <td>
 <a href="edit.php?id=<?= $p['id'] ?>">Edit</a> |
 <a href="hapus.php?id=<?= $p['id'] ?>"
 onclick="return confirm('Yakin hapus?')">Hapus</a>
 </td>
 </tr>
 <?php endforeach; ?>
</table>
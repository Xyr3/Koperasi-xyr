<?php

require_once "database.php";
require_once "produk.php";

$db = new Database();
$produk = new Produk($db->getConnection());

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit;
}

$produk->hapus($id);

header("Location: index.php");
exit;

?>
<?php
require_once 'database.php';
require_once 'penjualan.php';
$penjualan = new penjualan();
if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
	$id_menu	= trim($_POST['id_menu']);
	$jumlah	= trim($_POST['jumlah']);
	$penjualan->tambah_session($id_menu,$jumlah);
    // insert data menu
	header("Location:index.php");
}else if (isset($_POST['selesai'])) {
    // ambil data hasil submit dari form
	session_start();
	$no_meja	= trim($_POST['no_meja']);

	$id_penjualan=$penjualan->tambah_data($no_meja);
	foreach ($_SESSION['menu'] as $id_menu => $jumlah) {
		$penjualan->simpan_detail($id_penjualan,$id_menu,$jumlah);
	}
    // insert data menu
    unset($_SESSION['menu']);
	header("Location:index.php");
}else if (isset($_GET['id'])) {

	$id_menu = $_GET['id'];

	// delete data menu
	$penjualan->hapus_session($id_menu);
	header("Location:index.php");
}					
?>
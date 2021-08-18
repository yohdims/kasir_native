<?php
// memanggil file menu.php
require_once 'database.php';
require_once 'menu.php';
$menu = new menu();
if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
	$id_menu	= trim($_POST['id_menu']);
	$nama_menu	= trim($_POST['nama_menu']);
	$jenis_menu	= trim($_POST['jenis_menu']);
	$harga		= trim($_POST['harga']);


    // insert data menu
	if($id_menu==0){
		$menu->tambah_data($id_menu,$nama_menu,$jenis_menu,$harga);
		header("Location:index.php?page=tampil_menu&alert=2");
	}else{
		$menu->update_data($id_menu,$nama_menu,$jenis_menu,$harga);
		header("Location:index.php?page=tampil_menu&alert=2");
	}
}else if (isset($_GET['id'])) {

	$id = $_GET['id'];

	// delete data menu
	$menu->hapus_data($id);
	header("Location:index.php?page=tampil_menu&alert=4");
}					
?>
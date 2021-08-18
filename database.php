<?php
// -------------------- Akses Database ---------------//
class Database{
    private $db_host ="localhost";
    private $db_username ="root";
    private $db_pass ="";
    private $db_uses ="kasir";
    protected $konek ="";
    function __construct(){
        $this->konek =new mysqli($this->db_host,$this->db_username,$this->db_pass,$this->db_uses)or die('Koneksi Gagal');

        if(!$this->konek){echo "Koneksi database mysql dan php GAGAL !";}
    }
}

?>
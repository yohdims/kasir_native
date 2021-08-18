<?php
// -------------------- Class Mahasiswa untuk CRUD ---------------//
class Penjualan extends Database {

// -------------------- Fungsi Menampilkan Data ---------------//
    public function tampil_data(){
        $sql= "Select * From penjualan Order By id_penjualan DESC";
        $data=$this->konek->query($sql);
        while ($row=mysqli_fetch_array($data)) {
            $hasil[]=$row;
        }
        return $hasil;
    }
// -------------------- Fungsi Menampilkan Data berdasarkan ID ---------------//
    public function ambil_data($id_penjualan){
        $sql= "Select * From penjualan WHERE id_penjualan=$id_penjualan";
        $data=$this->konek->query($sql);
        $hasil=mysqli_fetch_array($data);
        return $hasil;
    }
// -------------------- Fungsi Menambahkan Data ---------------//
    public function tambah_data($no_meja)
    {
        $waktu_penjualan=Date("Y-m-d H:i:s");
        $sql= "INSERT INTO `penjualan` (no_meja,waktu_penjualan) VALUES ('$no_meja','$waktu_penjualan')";
        $insert=$this->konek->query($sql);
        $id_penjualan=$this->konek->insert_id;
        if($insert){
            $status= "Berhasil Menambahkan Data";
        }else{
            $status="Gagal Menambahkan Data".$sql;
        }
        return $id_penjualan;
    }
    public function tambah_session($id_menu,$jumlah)
    {
        session_start();
        if (isset($_SESSION['menu'][$id_menu])) 
        {
            $_SESSION['menu'][$id_menu]=$jumlah;
            $status= "Berhasil Menambahkan Pesanan";
        }else{
            $_SESSION['menu'][$id_menu]=$jumlah;
            $status="Gagal Menambahkan Data".$sql;
        }
        return $status;
    }
    public function hapus_session($id_menu)
    {
        session_start();
        unset($_SESSION['menu'][$id_menu]);
        $status="Gagal Menambahkan Data";
        return $status;
    }
    public function simpan_detail($id_penjualan,$id_menu,$jumlah)
    {
        $sql= "INSERT INTO `detail_penjualan` (id_penjualan,id_menu,jumlah) VALUES ('$id_penjualan','$id_menu','$jumlah')";
        $insert=$this->konek->query($sql);
        if($insert){
            $status= "Berhasil Menambahkan Data";
        }else{
            $status="Gagal Menambahkan Data".$sql;
        }
        return $status;
    }
}
?>
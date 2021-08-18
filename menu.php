<?php
// -------------------- Class Mahasiswa untuk CRUD ---------------//
class Menu extends Database {

// -------------------- Fungsi Menampilkan Data ---------------//
    public function tampil_data(){
        $sql= "Select * From menu Order By id_menu DESC";
        $data=$this->konek->query($sql);
        while ($row=mysqli_fetch_array($data)) {
            $hasil[]=$row;
        }
        return $hasil;
    }
// -------------------- Fungsi Menampilkan Data berdasarkan ID ---------------//
    public function ambil_data($id_menu){
        $sql= "Select * From menu WHERE id_menu=$id_menu";
        $data=$this->konek->query($sql);
        $hasil=mysqli_fetch_array($data);
        return $hasil;
    }
// -------------------- Fungsi Menambahkan Data ---------------//
    public function tambah_data($id_menu,$nama_menu,$jenis_menu,$harga)
    {
        $sql= "INSERT INTO `menu` (nama_menu,jenis_menu,harga) VALUES ('$nama_menu','$jenis_menu','$harga')";
        $insert=$this->konek->query($sql);
        if($insert){
            $status= "Berhasil Menambahkan Data";
        }else{
            $status="Gagal Menambahkan Data".$sql;
        }
        return $status;
    }
// -------------------- Fungsi Mengubah Data ---------------//
    public function update_data($id_menu,$nama_menu,$jenis_menu,$harga)
    {
        $sql= "UPDATE `menu` SET nama_menu='$nama_menu',jenis_menu='$jenis_menu',harga='$harga'  WHERE id_menu=$id_menu";
        $update=mysqli_query($this->konek,$sql);
        if($update){
            $status= "Berhasil Mengedit Data";
        }else{
            $status="Gagal Mengedit Data";
        }
        return $status;
    }
// -------------------- Fungsi Menghapus Data ---------------//
    public function hapus_data($id_menu)
    {
        $sql= "DELETE FROM `menu` WHERE id_menu=$id_menu";
        $delete=mysqli_query($this->konek,$sql);
        if($delete){
            $status= "Berhasil Menghapus Data";
        }else{
            $status="Gagal Menghapus Data";
        }
        return $status;
    }
}
?>
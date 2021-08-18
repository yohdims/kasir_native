  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-user"></i> Kasir
          
          <a class="btn btn-success pull-right" href="?page=tambah_menu">
            <i class="glyphicon glyphicon-plus"></i> Tambah
          </a>
          <a class="btn btn-primary pull-right" style="margin-right:10px" href="?">
            <i class="glyphicon glyphicon-"></i> Kembali
          </a>
        </h4>
      </div>

      <?php  
      if (empty($_GET['alert'])) {
        echo "";
      } elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-danger alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Terjadi kesalahan.
        </div>";
      } elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data menu berhasil disimpan.
        </div>";
      } elseif ($_GET['alert'] == 3) {
        echo "<div class='alert alert-success alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data menu berhasil diubah.
        </div>";
      } elseif ($_GET['alert'] == 4) {
        echo "<div class='alert alert-success alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data menu berhasil dihapus.
        </div>";
      }
      ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Kasir</h3>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Jenis Menu</th>
                <th>Aksi</th>
              </tr>
            </thead>   

            <tbody>
              <?php

            // membuat objek menu
              $menu = new menu();

            // mengambil seluruh data menu
              $result = $menu->tampil_data();

              $no = 1;

              if (!empty($result)) { 
                foreach($result as $data) {

                  ?>


                  <tr>
                    <td width='50' class='center'><?= $no; ?></td>
                    <td width='60'><?= $data['nama_menu']; ?></td>
                    <td width='150'><?= $data['harga']; ?></td>
                    <td width='180'><?= $data['jenis_menu']; ?></td>

                    <td width='100'>
                      <div class=''>
                        <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-success btn-sm' href='?page=ubah_menu&id=<?= $data['id_menu']; ?>'>
                          <i class='glyphicon glyphicon-edit'></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="proses-menu.php?id=<?= $data['id_menu']; ?>" onclick="return confirm('Anda yakin ingin menghapus menu <?php echo $data['nama']; ?>?');">
                          <i class="glyphicon glyphicon-trash"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <?php
                  $no++;
                }
              }
              ?>
            </tbody>           
          </table>
        </div>
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
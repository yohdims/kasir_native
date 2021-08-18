  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i> 
          Ubah data Menu
        </h4>
      </div> <!-- /.page-header -->
      <?php

      if (isset($_GET['id'])) {
        $id_menu = $_GET['id'];
        // memanggil file siswa.php
        require_once 'menu.php';
        
        // membuat objek siswa
        $menu = new menu();
        
        // mengambil data siswa
        $data = $menu->ambil_data($id_menu);

        $id_menu    = $data['id_menu'];
        $nama_menu  = $data['nama_menu'];
        $jenis_menu = $data['jenis_menu'];  
        $harga      = $data['harga'];  
      }
      ?>
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="proses-menu.php">
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Menu</label>
              <div class="col-sm-2">
                <input type="hidden" class="form-control" name="id_menu" value='<?= $id_menu;?>' autocomplete="off" required>
                <input type="text" class="form-control" name="nama_menu" value='<?= $nama_menu;?>'  autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Menu</label>
              <div class="col-sm-3">
                <select class="form-control" name="jenis_menu" placeholder="Pilih" required>
                  <option value=""></option>
                  <option value="Makanan" <?= $jenis_menu=='Makanan'?"selected":"" ?>>Makanan</option>
                  <option value="Minuman" <?= $jenis_menu=='Minuman'?"selected":"" ?>>Minuman</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Harga</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="harga" value='<?= $harga;?>' autocomplete="off" required>
              </div>
            </div>

            <hr/>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                <a href="index.php" class="btn btn-default btn-reset">Batal</a>
              </div>
            </div>
          </form>
        </div> <!-- /.panel-body -->
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
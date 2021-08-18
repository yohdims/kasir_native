  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-user"></i> Kasir
          
          <a class="btn btn-success pull-right" href="?page=tampil_menu">
            <i class="glyphicon glyphicon-plus"></i> Data Menu
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
         <div class="rows">
           <div class="col-md-8">
            <h3>Daftar Menu</h3>
            
            <table class="table table-striped table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>Nama Menu</th>
                  <th>Harga</th>
                  <th>Jenis Menu</th>
                  <th>Jumlah</th>
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
                      <form method="POST" action='proses-penjualan.php'>
                        <td width='60'><?= $data['nama_menu']; ?></td>
                        <td width='150'>Rp. <?= number_format($data['harga']); ?></td>
                        <td width='180'><?= $data['jenis_menu']; ?></td>
                        <td width='180px'>
                          <input type="hidden" name='id_menu' value='<?= $data['id_menu']; ?>' />
                          <input type="number" name='jumlah' style="width:50px" min='1' value='1' />
                        </td>

                        <td width='100'>
                          <div class=''>
                            <button data-toggle='tooltip' data-placement='top' title='Pesan' style='margin-right:5px' class='btn btn-success btn-sm' name="simpan">
                              <i class='glyphicon glyphicon-edit'></i>
                            </button>
                          </div>
                        </td>
                      </form>
                    </tr>
                    <?php
                    $no++;
                  }
                }
                ?>
              </tbody>           
            </table>
          </div>
          <div class="col-md-4">
            <h3>Pesanan</h3>
            
            <table class="table table-striped table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>Nama Menu</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $jumlah_bayar=0;
                if(!empty($_SESSION['menu'])){

                  foreach($_SESSION['menu'] as $pesan=>$jumlah) {
                    $menu= new Menu();
                    $data_menu=$menu->ambil_data($pesan);
                    $jumlah_bayar+=$data_menu['harga']*$jumlah;
                    ?>
                    <tr>
                      <td width='60'><?= $data_menu['nama_menu']; ?></td>
                      <td width='150'>Rp. <?= number_format($data_menu['harga']); ?></td>
                      <td width='180px'><?= $jumlah; ?></td>

                      <td width='100'>
                        <div class=''>
                          <a href="proses-penjualan.php?id=<?= $data_menu['id_menu'] ?>" data-toggle='tooltip' data-placement='top' title='Pesan' style='margin-right:5px' class='btn btn-danger btn-sm'  name='simpan'>
                            <i class='glyphicon glyphicon-trash'></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                    <?php
                  }
                }
                ?>
              </table>
              <form method="POST" action="proses-penjualan.php">
                <table>
                  <tr>
                    <td width="50%">No Meja</td>
                    <td><input type="text" name="no_meja" style="width: 60px" required=""></td>
                  </tr>
                  <tr>
                    <td>Total Pembayaran</td>
                    <td>IDR <?= number_format($jumlah_bayar,2); ?></td>
                  </tr>
                  <tr>
                    <td>Pembayaran</td>
                    <td><input type="hidden" id='jumlah_bayar' value="<?= $jumlah_bayar;?>" required=""><input type="number" id='pembayaran' required=""></td>
                  </tr>
                  <tr>
                    <td>Kembalian</td>
                    <td id='kembalian'></td>
                  </tr>
                </table>
                

                 <br>
                <button data-toggle='tooltip' data-placement='top' title='Selesai' style='margin-right:5px' class='btn btn-primary btn-sm'  name='selesai'>
                  Selesai
                </button>
              </form>
            </div>
          </div>
        </div>
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
  
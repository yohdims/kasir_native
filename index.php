<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Aplikasi CRUD</title>

  <!-- favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.png">

  <!-- Bootstrap -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/datepicker.min.css" rel="stylesheet">
  <link href="assets/js/dataTables/css/dataTables.bootstrap.css" rel="stylesheet">

  <!-- styles -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Fungsi untuk membatasi karakter yang diinputkan -->
  <script language="javascript">
    function getkey(e)
    {
      if (window.event)
        return window.event.keyCode;
      else if (e)
        return e.which;
      else
        return null;
    }

    function goodchars(e, goods, field)
    {
      var key, keychar;
      key = getkey(e);
      if (key == null) return true;

      keychar = String.fromCharCode(key);
      keychar = keychar.toLowerCase();
      goods = goods.toLowerCase();

        // check goodkeys
        if (goods.indexOf(keychar) != -1)
          return true;
        // control keys
        if ( key==null || key==0 || key==8 || key==9 || key==27 )
          return true;

        if (key == 13) {
          var i;
          for (i = 0; i < field.form.elements.length; i++)
            if (field == field.form.elements[i])
              break;
            i = (i + 1) % field.form.elements.length;
            field.form.elements[i].focus();
            return false;
          };
        // else return false
        return false;
      }
    </script>
  </head>
  <body>
    <?php 
    session_start();
    include "database.php";
    include "menu.php";
    include "penjualan.php";
    ?>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand -->
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">
            <i class="glyphicon glyphicon-check"></i>
            Aplikasi CRUD PHP OOP dan MySQLi
          </a>
        </div>
      </div> <!-- /.container-fluid -->
    </nav>

    <div class="container-fluid">
      <?php
      if (empty($_GET["page"])) {
        include "kasir.php";
      } elseif ($_GET['page'] == 'tambah_menu') {
        include "form-tambah.php";
      } elseif ($_GET['page'] == 'ubah_menu') {
        include "form-ubah.php";
      } elseif ($_GET['page'] == 'tampil_menu') {
        include "tampil-data.php";
      } 
      ?>
    </div> <!-- /.container-fluid -->
    
    <footer class="footer">
      <div class="container-fluid">
        <p class="text-muted pull-left">&copy; 2016 Indra Studio</p>
        <p class="text-muted pull-right ">Theme by <a href="http://www.getbootstrap.com" target="_blank">Bootstrap</a></p>
      </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript">
      $('#pembayaran').keyup(function() {
        // var stok = $("#id_barang option:selected").attr("max");
        var pembayaran = $("#pembayaran").val();
        var jumlah_bayar = $("#jumlah_bayar").val();
        var kembalian=pembayaran-jumlah_bayar;
        var strkembalian=(kembalian).toLocaleString('en-US', {
          style: 'currency',
          currency: 'IDR',
        }); 
        $('#kembalian').html(strkembalian);
         // $("#jumlah2").val(stok);
       })
      $('#kembalian').html("IDR 0");
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>
    <!-- DataTables -->
    <script src="assets/js/dataTables/js/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/js/dataTables.bootstrap.js"></script>

    <script type="text/javascript">
      $(function () {

        //datepicker plugin
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        });

        // toolip
        $('[data-toggle="tooltip"]').tooltip();

        $('#dataTables-example').dataTable( {
          "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
          "pageLength": 5
        } );
      })
    </script>
  </body>
  </html>
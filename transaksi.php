<!DOCTYPE html>
<?php
  require "database.php";
  $conn = connectDB();
  session_start();

  $username = $user_id = $title = $date = $content = $fullname = $comment = $user = '';
  
  if(isset($_SESSION["userlogin"])){
    $username = $_SESSION['userlogin'];
  } else {
    header("Location: login.php");
  }
?>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Intan Gallery Database</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/grayscale.min.css" rel="stylesheet">
    <link href="css/utama.css" rel="stylesheet">
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i> <span class="light">Intan Gallery</span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <button class="btn btn-dropdown dropdown-toggle" type="button" data-toggle="dropdown">Hello, <?php echo $username ?>  <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="barang.php">Lihat Detail Barang</a></li>
                          <li><a href="transaksi.php">Edit Transaksi</a></li>
                          <li><a href="statistik.php">Lihat Statistik</a></li>
                          <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class ="container results">
      <table id="example" class="display table table-bordered container">
        <thead class="thead-inverse">
          <tr>
              <th>Tanggal</th>
              <th>Kode</th>
              <th>Harga Jual</th>
              <th>Jumlah</th>
            </tr>
        </thead>
        <?php
          $query = "SELECT t.tanggal, t.kode, t.harga_jual, t.jumlah FROM gallery.transaksi t";
              
          $result = $conn->query($query);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".$row["tanggal"]."</td>";
              echo "<td>".$row["kode"]."</td>";
              echo "<td>".$row["harga_jual"]."</td>";
              echo "<td>".$row["jumlah"]."</td>";
              echo "</tr>";
            }
          } else {
            echo "0 results";
          }
          $conn->close();
        ?>
      </table>
    </div>

    <div class="container tambah">
      <button class="btn-default btn-lg" data-toggle="modal" data-target="#modal-tambah">Tambah Barang</button>
    </div>

    <div class="modal fade" id="modal-tambah" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Buat Transaksi Baru</h4>
          </div>
          <div class="modal-body text-center">
            <form>
              <input id="inputtanggal" name="inputtanggal" class="form-control" placeholder="Masukkan Tanggal Transaksi" size="40" /><br>
              <input id="inputkodebarang" name="inputkodebarang" class="form-control" placeholder="Masukkan Kode Barang" size="40" /><br>
              <input id="inputhargajual" name="inputhargajual" class="form-control" placeholder="Masukkan Harga Jual" size="40" /><br>
              <input id="inputjumlah" name="inputjumlah" class="form-control" placeholder="Masukkan Jumlah Item" size="40" /><br>
              <input type="submit" class="btn-primary" value="OK!">
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- DataTables JS -->
    <script src="js/intangallery.js"></script>
    <script src="https://cdn.dataTables.net/1.10.13/js/jquery.dataTables.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/grayscale.min.js"></script>
  </body>
</html>
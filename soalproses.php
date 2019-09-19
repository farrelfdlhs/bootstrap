<?php
    if (isset($_POST['byr'])) {
        $nama = $_POST['nm'];
        $alamat = $_POST['al'];
        $jk = $_POST['jk'];
        $tanggal = $_POST['tgl'];
        $jumlah = $_POST['jml'];
        $kode = $_POST['kb'];
        $pengarang = $_POST['peng'];
        $jns = $_POST['jenis'];
        $jdl = $_POST['jb'];
        $hrga = $_POST['harga'];
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>
<body>
        <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Assalaam</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="soal.php">Toko Buku<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="logout">Logout</button>
    </form>
  </div>
</nav>
    <!-- end Navbar -->

    <!-- content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="padding:20px">
                <div class="card">
                    <div class="card-header"><center>Assalaam Book Store</center></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" style="align:center">
                                <tr align="center">
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th colspan="1">Jenis Kelamin</th>
                                    <th colspan="1">Jumlah</th>
                                    <th colspan="2">Tanggal Pembelian</th>
                                </tr>
                                <tr align="center">
                                    <td><?php echo $nama; ?></td>
                                    <td><?php echo $alamat; ?></td>
                                    <td><?php echo $jk; ?></td>
                                    <td><?php echo $jumlah; ?></td>
                                    <td colspan="2"><?php echo $tanggal; ?></td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="6"><b>Daftar Buku Yang Dibeli</b></td>
                                </tr>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Judul</th>
                                    <th>Kode</th>
                                    <th>Pengarang</th>
                                    <th>Jenis Buku</th>
                                    <th>Harga (Rp)</th>
                                </tr>
                                <?php foreach ($jdl as $key => $value) {
                                    # code...
                                 ?>
                                <tr>
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $jdl[$key]; ?></td>
                                    <td><?php echo $kode[$key]; ?></td>
                                    <td><?php echo $pengarang[$key]; ?></td>
                                    <td><?php echo $jns[$key]; ?></td>
                                    <td><?php echo $hrga[$key]; ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td align="center" colspan="6"><b>Total Pembayaran</b></td>
                                </tr>
                                <?php 
                                    $a = array_sum($hrga);
                                    if ($key >= 3) {
                                        $disc = 0.05*$a;
                                        $ttl = $a-$disc;
                                    } if ($key >= 5) {
                                        $disc = 0.1*$a;
                                        $ttl = $a-$disc;
                                    } else {
                                        $disc = 0;
                                        $ttl = $a;
                                    }
                                    
                                ?>
                                <tr>
                                    <th>Sub Harga</th>
                                    <td align="right" colspan="5"><?php echo $a; ?></td>
                                </tr>
                                <tr>
                                    <th>Diskon</th>
                                    <td align="right" colspan="5"><?php echo $disc; ?></td>
                                </tr>
                                <tr>
                                    <th>Sub Total</th>
                                    <td align="right" colspan="5"><?php echo $ttl; ?></td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="6"><b>Pembayaran</b></td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <form action="" method="POST">
                                            <label for="">Masukkan Pembayaran</label>
                                            <input type="number" class="form-control" min="1" name="byr" required><br>
                                            <input type="submit" class="btn btn-success form-control" name="bayarrr" value="Bayar">
                                        </form>
                                    </td>
                                </tr>
                                <?php 
                                    if (isset($_POST['bayarrr'])) {
                                        $uang = $_POST['byr'];
                                        if ($uang >= $ttl) {
                                            $kmbl = $uang-$ttl;
                                        } else if ($uang == $ttl){
                                            $kmbl = $uang-$ttl;
                                        } else {
                                            $kmbl = "Uang Kurang";
                                        }
                                        
                                    }
                                ?>
                                <tr>
                                    <th>Kembalian</th>
                                    <td align="right" colspan="5"><?php echo $kmbl; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->

    <!-- JS -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <!-- End JS -->
</body>
</html>
    <?php } ?>
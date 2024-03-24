<?php
session_start();
$userid = $_SESSION['userid'];
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
  echo "<script>
  alert('Anda belum Login!');
  location.href='../index.php';
  </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Galeri Foto</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css" />
</head>
<style>
  body {
    margin: 0;
    background: linear-gradient(90deg, #884ec3, #f1a4b5);
  }

  .a href:hover {
    color: rgb(9, 175, 134);
  }

  #floatingButton {
    position: fixed;
    bottom: 20px;
    right: 20px;
    padding: 10px 20px;
    background-color: #884ec3;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  }

  #floatingButton2 {
    position: fixed;
    bottom: 80px;
    right: 20px;
    padding: 10px 20px;
    background-color: #884ec3;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top " style="background-color: #000000">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <h3>Galeri Foto</h3>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">
        </div>
        <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
      </div>
    </div>
  </nav>
  <div class="container mt-2">
    <div class="row">
      <?php
      $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN  user ON foto.userid=user.userid INNER JOIN album ON foto.albumid=album.albumid");
      while ($data = mysqli_fetch_array($query)) {
        ?>

        <div class="col-md-3">
          <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">
            <div class="card">
              <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top"
                title="<?php echo $data['judulfoto'] ?>" style="height: 12rem;">
              <div class="card-footer text-center">
                <?php
                $fotoid = $data['fotoid'];
                $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                $cekbatalsuka = mysqli_query($koneksi, "SELECT * FROM unlikefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                if (mysqli_num_rows($ceksuka) == 1) { ?>
                  <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                    name="batalsuka"><i class="fa fa-thumbs-up m-1"></i></a>

                <?php } else { ?>
                  <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="suka"><i
                      class="fa fa-regular fa-thumbs-up m-1"></i></a>

                <?php }
                $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                echo mysqli_num_rows($like) . ' ';
                ?>
                <?php
                if (mysqli_num_rows($cekbatalsuka) == 1) { ?>
                  <a href="../config/proses_unlike.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                    name="batalsuka"><i class="fa fa-thumbs-down m-1"></i></a>

                <?php } else { ?>
                  <a href="../config/proses_unlike.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="suka"><i
                      class="fa fa-thumbs-down m-1"></i></a>

                <?php }
                $unlike = mysqli_query($koneksi, "SELECT * FROM unlikefoto WHERE fotoid='$fotoid'");
                echo mysqli_num_rows($unlike) . ' ';
                ?>
                <a href="#" type="button" data-bs-toggle="modal"
                  data-bs-target="#komentar<?php echo $data['fotoid'] ?>"><i class=" fa fa-regular fa-comment"
                    style="color:#EE4266"></i></a>

                <?php
                $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                echo mysqli_num_rows($jmlkomen) . ' Komentar';
                ?>
              </div>
            </div>
          </a>

          <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-body" style="background-color:#FEC8D8">
                  <div class="row">
                    <div class="col-md-8">
                      <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top"
                        title="<?php echo $data['judulfoto'] ?>" style="height:13rem width:20rem; border-radius: 10px;">
                    </div>
                    <div class="col-md-4">
                      <div class="m-2">
                        <div class="overflow-auto">
                          <div class="stycky-top">
                            <strong>
                              <?php echo $data['judulfoto'] ?>
                            </strong><br>
                            <span class="badge bg-secondary">
                              <?php echo $data['namalengkap'] ?>
                            </span>
                            <span class="badge bg-secondary">
                              <?php echo $data['tanggalunggah'] ?>
                            </span>
                            <span class="badge bg-primary">
                              <?php echo $data['namaalbum'] ?>
                            </span>
                          </div>
                          <hr>
                          <p align="left">
                            <?php echo $data['deskripsifoto'] ?>
                          </p>
                          <hr>
                          <?php
                          $fotoid = $data['fotoid'];
                          $Komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid ='$fotoid'");
                          while ($row = mysqli_fetch_array($Komentar)) {
                            ?>
                            <p align="left">
                              <strong>
                                <?php echo $row['namalengkap'] ?>
                              </strong>
                              <?php echo $row['IsiKomentar'] ?>
                            </p>
                          <?php } ?>
                          <hr>
                          <div class="sticky-bottom">
                            <form action="../config/proses_komentar.php" method="POST">
                              <div class="input-group">
                                <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                <input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar"
                                  style="border-radius: 20px">
                                <div class="input-group-prepend">
                                  <button type="submit" name="kirimkomentar"
                                    Class="btn btn-outline-primary">Kirim</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
  <div class="jumbotron">
    <a href="album.php" class="btn" id="floatingButton">Album</a>
    <a href="foto.php" class="btn" id="floatingButton2">Foto</a>
  </div>
  <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>

</html>
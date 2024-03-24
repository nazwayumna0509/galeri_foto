<?php
session_start();
$userid = $_SESSION['userid'];
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login')  {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <style>
		body {
			margin: 0;
			background: linear-gradient(90deg, #884ec3, #f1a4b5);
		}
	</style>
  </head>

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
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
          <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="foto.php">Foto</a></li>
          <li class="nav-item"><a class="nav-link" href="album.php">Album</a></li>
        </ul>
      </div>
      <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">
        </div>
        <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
      </div>
    </div>
  </nav>

<div class="container mt-3">
Album :
<?php
$album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
while($row = mysqli_fetch_array($album)){ ?>
<a href="home.php?albumid=<?php echo $row['albumid'] ?>" class="bg-warning btn btn-outline"><?php echo $row['namaalbum'] ?></a>


<?php } ?>

    <div class="row">
      <?php
      if (isset($_GET['albumid'])) {
        $albumid = $_GET['albumid'];
        $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid' AND albumid='$albumid'");
        while($data = mysqli_fetch_array($query)){ ?>
        <div class="col-md-3 mt-2">
              <div class="card">
                  <img style="height: 12rem left:10px;" src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                  <div class="card-footer text-center">
                      
                      <?php
                      $fotoid = $data['fotoid'];
                      $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                      if (mysqli_num_rows($ceksuka) == 1) { ?>
                        <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="batalsuka"><i class="fa fa-heart"></i></a>
                      <?php }else{ ?>
                        <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="suka"><i class="fa-regular fa-heart"></i></a>
                        
                      <?php }
                      $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                      echo mysqli_num_rows($like). ' Suka';
                      ?>
                      <a href=""><i class="fa-regular fa-comment"></i></a> 3 Komentar</a>
                  </div>
              </div>
          </div>
          
        <?php } }else{
    
  
  $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
  while($data = mysqli_fetch_array($query)) {
  ?>
          <div class="col-md-3 mt-2">
              <div class="card">
                  <img style="height: 12rem left: 10px;" src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                  <div class="card-footer text-center">
                      
                      <?php
                      $fotoid = $data['fotoid'];
                      $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                      if (mysqli_num_rows($ceksuka) == 1) { ?>
                        <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="batalsuka"><i class="fa fa-heart"></i></a>
                      <?php }else{ ?>
                        <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="suka"><i class="fa-regular fa-heart"></i></a>
                      <?php }
                      $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                      echo mysqli_num_rows($like). ' Suka';
                      ?>
                      <a href=""><i class="fa-regular fa-comment"></i></a> 3 Komentar</a>
                  </div>
              </div>
          </div>


<?php } } ?>
</div>
</div>

<script type="text/javascript" src="../assets/js/bootstrap.min.css"></script>
</body>
</html>
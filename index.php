<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/hero.css">
</head>
<style>
  body{
    background-color: #e6c1ff;
  }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top " style="background-color: #000000">
  <div class="container">
    <a class="navbar-brand" href="index.php"><h3>Galeri Foto</h3></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
      </div>
      <a href="register.php" class="btn btn-outline-primary m-1">Register</a>
      <a href="login.php" class="btn btn-outline-success m-1">Login</a>
    </div>
  </div>
</nav>
<section id="hero" class="d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
              <h1>Selamat Datang di Galeri Foto</h1>
              <h2>Simpan dan Bagikan foto-foto terbaik</h2>
            </div>
            <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="200">
              <img src="assets/aset_galeri/hero-image.jpg">
            </div>
          </div>
        </div>
</section>
<!-- carousel -->
<div class="container-fluid carousel-contain py-5">
                <div class="container">
                  <div id="carouselExampleIndicators" class="carousel slide col-lg-8 offset-lg-2" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="assets/aset_galeri/4.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="assets/aset_galeri/3.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="assets/aset_galeri/5.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                      </div>
                      
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                </div>
              </div>
            <!-- end of carousel -->
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>
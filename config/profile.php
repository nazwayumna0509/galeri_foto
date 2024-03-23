<?php
session_start();
include 'koneksi.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
$query = mysqli_query($conn, "SELECT * FROM userr WHERE UserID ='" . $_SESSION['id'] . "'");
$d = mysqli_fetch_object($query);

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WEB Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="bo/css/bootstrap.min.css">
</head>
<style>
.btn1 {
  border: 1px solid #000;
  padding: 8px 16px; 
  background-color: #9966ff;
  color: #000; 
  cursor: pointer; 
}

.btn1:hover {
  background-color: #e0e0e0;
}
</style>
<body>
  <nav class="navbar navbar-expand-lg" style="background-color: #9966ff;">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">WEB GALERI FOTO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="profil.php">Profile</a>
        </li>   
        <li class="nav-item">
          <a class="nav-link active" href="album.php">Album</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Namalengkap" class="input-control"
                        value="<?php echo $d->NamaLengkap ?>" required>
                    <input type="text" name="user" placeholder="username" class="input-control"
                        value="<?php echo $d->Username ?>" required>
                    <input type="email" name="email" placeholder="email" class="input-control"
                        value="<?php echo $d->Email ?>" required>
                    <input type="text" name="alamat" placeholder="alamat" class="input-control"
                        value="<?php echo $d->Alamat ?>" required>
                  
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    $nama = $_POST['namalengkap'];
                    $user = $_POST['username'];
                    $email = $_POST['email'];
                    $alamat = $_POST['alamat'];

                    $update = mysqli_query($conn, "UPDATE tb_admin SET 
					                  admin_name = '" . $nama . "',
									  username = '" . $user . "',
									  admin_telp = '" . $hp . "',
									  admin_email = '" . $email . "',
									  admin_address = '" . $alamat . "'
									  WHERE admin_id = '" . $d->admin_id . "'");
                    if ($update) {
                        echo '<script>alert("Ubah data berhasil")</script>';
                        echo '<script>window.location="profil.php"</script>';
                    } else {
                        echo 'gagal ' . mysqli_error($conn);
                    }

                }
                ?>
            </div>

            <h3>Ubah password</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control"
                        required>
                    <input type="submit" name="ubah_password" value="Ubah Password" class="btn1">
                </form>
                <?php
                if (isset($_POST['ubah_password'])) {

                    $pass1 = $_POST['pass1'];
                    $pass2 = $_POST['pass2'];

                    if ($pass2 != $pass1) {
                        echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
                    } else {
                        $u_pass = mysqli_query($conn, "UPDATE userr SET 
									  password = '" . $pass1 . "'
									  WHERE UserID = '" . $d->UserID . "'");
                        if ($u_pass) {
                            echo '<script>alert("Ubah data berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        } else {
                            echo 'gagal ' . mysqli_error($conn);
                        }
                    }

                }
                ?>
            </div>
        </div>
    </div>
    </div>
    <!-- footer -->
    <footer>
        <div class="container">
           <p align="center"  >Copyright &copy; 2024 - Website Gallery Yumna</p>
        </div>
    </footer>
</body>

</html>
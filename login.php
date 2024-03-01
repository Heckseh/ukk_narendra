<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="asset/style.css">
  
<?php
include "koneksi.php";
session_start();

if (isset($_POST['login'])) {
  
    $username=$_POST['username'];
    $password=$_POST['password'];
    

    $sql=mysqli_query($conn, "SELECT * from user where username='$username' and password='$password'");

    $cek=mysqli_num_rows($sql);

    if($cek == 1) {
        while($data=mysqli_fetch_array($sql)) {
            $_SESSION['userid'] = $data['userid'];
            $_SESSION['namalengkap'] = $data['namalengkap'];
      $_SESSION['login'] = true;
      $nama =$data['namalengkap'];
        }
    echo "<script>
  alert ('login berhasil, selamat datang $nama');
  location.href='admin.php';
</script> ";
    } else {
    echo "<script>
  alert ('login gagal, username dan password tidak sesuai');
  location.href='login.php';
</script> ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="asset/style.css">
</head>

<body>
  <?php
  include "layout/header-login.html";
  ?>

  <?php
  include "layout/footer.html";
  ?>

  <div class="row d-flex justify-content-center  mx-auto" style=" width: 800px; margin: 70px;">
    <div class=" col-sm-7  p-5 text-white  rounded-3" style="background-color: #005b41;">
      <h1 class="text-center" style="color: white">LOGIN <hr></h1>
      <form action="login.php" method="POST">
        <form action="/action_page.php">
          <div class="mb-3 mt-3 ">
            <label for="username" class="form-label"></label>
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label"></label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
          </div>
          <div class="mb-3 m-2">
            <p>Belum punya akun? Daftar disini <a href="register.php">klik disini</a></p>
          </div>
          <div class="col-p-4 text-center">
          <div class="d-grid">
          <button type="submit" class="btn btn-dark border" name="login">Login</button>
          <div>
          </div>
          
          </div>
        </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
</body>


</html>
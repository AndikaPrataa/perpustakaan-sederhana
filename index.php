<?php
include('includes/db.php');
session_start();

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Anggota WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    $sql_nama = "SELECT nama FROM Anggota WHERE email='$email' AND password='$password'";
    $nama = $conn->query($sql_nama);

    if ($result->num_rows > 0) {
        echo "Login berhasil!";
        header('location: home.php');
        $_SESSION['is_login'] = true;
        $row = $nama->fetch_assoc();
        $_SESSION['nama'] = $row['nama'];
    } else {
        echo "Email atau password salah.";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style type="text/css">
      .container {
        width: 30%;
        margin-top: 10%;
        box-shadow: 0 3px 20px rgba(0, 0, 0.8);
        padding: 40px;
        background-color: #d3d3d3;
      }

      .ml {
        margin-left: 43%;
      }

      .mlr {
        margin-left: 41%;
      }

      p {
        margin-bottom: 0%;
        margin-top: 5%;

      }
    </style>

    <title>Login</title>
  </head>
  <body>   
    <div class="container">
      <h3 class="text-center">Login</h3>
      <hr>      
      <form method="POST" action="index.php">
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <div>
          <button type="submit" name="login" class="btn btn-primary btn-sm ml">Login</button>
          <br>
          <p class="text-center">Belum punya akun? Silahkan</p>
          <a href="register.php" class="text-center mlr">Registrasi</a>
        </div>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>

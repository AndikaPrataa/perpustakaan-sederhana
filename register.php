<?php
include('includes/db.php');

if(isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $password = $_POST['password'];

    $sql = "INSERT INTO Anggota (nama, alamat, email, nomor_telepon, password) VALUES ('$nama', '$alamat', '$email', '$nomor_telepon', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil! Silahkan Login " . $nama;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
        margin-top: 2%;
        box-shadow: 0 3px 20px rgba(0, 0, 0.8);
        padding: 40px;
        background-color: #d3d3d3;
      }

      .ml {
        margin-left: 45%;
      }

      .mlr {
        margin-left: 41%;
      }

      p {
        margin-bottom: 0%;
        margin-top: 5%;
        margin-left: 5%;
      }
    </style>

    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <h3 class="text-center">Login</h3>
      <hr>
    <form action="register.php" method="POST">
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <textarea name="alamat" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nomor Telepon:</label>
                <input type="text" name="nomor_telepon" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
          <button type="submit" name="register" class="btn btn-primary btn-sm mlr">Register</button>
          <br>
          <p class="text-center">Sudah punya akun? Silahkan</p>
          <a href="index.php" class="text-center ml">Login</a>
        </div>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>
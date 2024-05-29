<?php
include('includes/db.php');
session_start();

if(isset($_POST['books'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $sql = "INSERT INTO buku (`judul`, `penulis`, `penerbit`, `tahun_terbit`, `tanggal`) VALUES ('$judul', '$penulis', '$penerbit', '$tahun_terbit', CURRENT_DATE())";

    if ($conn->query($sql) === TRUE) {
        echo "Buku berhasil dipinjam, Silahkan cek laman peminjaman";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
    header('Location: index.php');
}

if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === false) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Buku</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Penting */
            font-size: 16px;
        }
        .btn {
            padding: 10px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>Perpustakaan</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li class="current"><a href="books.php">Buku</a></li>
                    <li><a href="loans.php">Peminjaman</a></li>
                    <li><a href="logout.php" name="logout">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h2>Peminjaman Buku</h2>
        <form action="books.php" method="POST">
            <div class="form-group">
                <label>Judul:</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Penulis:</label>
                <input type="text" name="penulis" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Penerbit:</label>
                <input type="text" name="penerbit" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tahun Terbit:</label>
                <input type="year" name="tahun_terbit" class="form-control" required>
            </div>
          <button type="submit" name="books" class="btn">Pinjam Buku</button>
        </div>
      </form>
    </div>
</body>
</html>

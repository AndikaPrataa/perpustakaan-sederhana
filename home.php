<?php
include('includes/db.php');
include('includes/functions.php');

session_start();

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
    <title>Perpustakaan</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>Perpustakaan</h1>
            </div>
            <nav>
                <ul>
                    <li class="current"><a href="home.php">Home</a></li>
                    <li><a href="books.php">Buku</a></li>
                    <li><a href="loans.php">Peminjaman</a></li>
                    <li><a href="logout.php" name="logout">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h2>Selamat Datang <?=  $_SESSION['nama']?> di Perpustakaan</h2>
        <p>Sistem peminjaman buku perpustakaan sederhana.</p>
    </div>
</body>
</html>

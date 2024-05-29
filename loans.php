<?php
include('includes/db.php');
include('includes/functions.php');
$books = getAllBooks($conn);

session_start();
if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
    header('Location: index.php');
}

if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === false) {
    header('Location: index.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM buku WHERE id_buku = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Buku berhasil dikembalikan. Terima Kasih!!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM buku";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Peminjaman</title>
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
                    <li><a href="home.php">Home</a></li>
                    <li><a href="books.php">Buku</a></li>
                    <li class="current"><a href="loans.php">Peminjaman</a></li>
                    <li><a href="logout.php" name="logout">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h2>Daftar Peminjaman</h2>
        <?php if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>No Seri Peminjaman</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Kembalikan Buku</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id_buku"] . "</td>
                        <td>" . $row['judul'] . "</td>
                        <td>" . $row['penulis'] . "</td>
                        <td>" . $row['penerbit'] . "</td>
                        <td>" . $row['tahun_terbit'] . "</td>
                        <td>" . $row['tanggal'] . "</td>

                        <td>
                            <a href='?id=" . $row["id_buku"] . "' onclick='return confirm(\"Apakah Anda yakin ingin mengembalikan buku? " . $row["id_buku"] . "?\")'>Kembalikan</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
            } else {
            echo "Tidak ada buku yang dipinjam";
            }
        ?>
    </div>
</body>
</html>


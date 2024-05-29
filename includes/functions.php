<?php
function getAllBooks($conn) {
    $sql = "SELECT * FROM Buku";
    $result = $conn->query($sql);
    return $result;
}

function getAllLoans($conn) {
    $sql = "SELECT * FROM Peminjaman";
    $result = $conn->query($sql);
    return $result;
}
?>

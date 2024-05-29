<?php 
session_start();
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Confirm Logout</title>
<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .container {
        width: 300px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #d3d3d3;
        text-align: center;
    }
    .btn {
        padding: 10px 20px;
        margin: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .btn-logout {
        background-color: #f44336;
        color: white;
    }
    .btn-cancel {
        background-color: white;
        color: #000;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Yakin ingin logout?</h2>
    <form action="logout.php" method="POST">
        <button type="submit" class="btn btn-logout" name="logout">Ya, Logout</button>
        <button type="button" class="btn btn-cancel" onclick="history.back()">Batal</button>
    </form>
</div>

</body>
</html>

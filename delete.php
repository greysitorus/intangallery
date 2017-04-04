<?php
//Define the query
require "database.php";
$conn = connectDB();
$kode = $_POST['kode'];
$query = "DELETE FROM gallery.barang WHERE kode='".$kode."'";
$result = $conn->query($query);
header('Location: barang.php');
?>
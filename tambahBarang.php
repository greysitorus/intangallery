<!DOCTYPE html>

<?php
require "database.php";
$conn = connectDB();

if (isset($_POST['kodebarang'])) {
	
} else {
	header("Location: login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$kode = $_POST['kodebarang'];
	$nama = $_POST['namabarang'];
	$modal = $_POST['modal'];
	$hargamin = $_POST['hargamin'];
	$pemasok = $_POST['pemasok'];
	$stok = $_POST['stok'];
	
	$sql = "INSERT into barang(kode, nama, modal, harga_minimum, stok, pemasok) values ('$kode','$nama','$modal','$hargamin','$pemasok','$stok')";
	
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	header("Location: barang.php");
}
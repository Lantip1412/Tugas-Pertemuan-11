<?php
include_once 'konek.php';
$id = $_GET['id'];
$sql = "DELETE FROM data_barang WHERE id_barang = '{$id}'";
$result = mysqli_query($konek, $sql);
header('location: index.php');
?>

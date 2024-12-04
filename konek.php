<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "latihan1";

$konek = new mysqli($host, $username, $password, $database);

if ($konek->connect_error) {
  die("Koneksi Gagal : " . $konek->connect_error);
}

<?php
error_reporting(E_ALL);
include_once 'konek.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $Katagori = $_POST['Katagori'];
  $harga_jual = $_POST['harga_jual'];
  $harga_beli = $_POST['harga_beli'];
  $stok = $_POST['stok'];
  $file_gambar = $_FILES['file_gambar'];
  $gambar = null;
  if ($file_gambar['error'] == 0) {
    $filename = str_replace(' ', '_', $file_gambar['name']);
    $destination = dirname(__FILE__) . '' . $filename;
    if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
      $gambar = '' . $filename;;
    }
  }
  $sql = 'UPDATE data_barang SET ';
  $sql .= "nama = '{$nama}', Katagori = '{$Katagori}', ";
  $sql .= "harga_jual = '{$harga_jual}', harga_beli = '{$harga_beli}', stok = '{$stok}' ";
  if (!empty($gambar))
    $sql .= ", gambar = '{$gambar}' ";
  $sql .= "WHERE id_Barang = '{$id}'";
  $result = mysqli_query($konek, $sql);
  header('location: index.php');
}
$id = $_GET['id'];
$sql = "SELECT * FROM data_barang WHERE id_Barang = '{$id}'";
$result = mysqli_query($konek, $sql);
if (!$result) die('Error: Data tidak tersedia');
$data = mysqli_fetch_array($result);
function is_select($var, $val)
{
  if ($var == $val) return 'selected="selected"';
  return false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Ubah Barang</title>
</head>
<style>
  /* CSS untuk Tampilan Ubah Barang */

  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  .container {
    width: 80%;
    margin: auto;
    overflow: hidden;
  }

  h1 {
    color: #35424a;
    text-align: center;
  }

  form {
    background: #ffffff;
    padding: 20px;
    border: #e8491d 1px solid;
    margin-top: 20px;
    border-radius: 5px;
  }

  .input {
    margin-bottom: 15px;
  }

  .input label {
    margin-bottom: 5px;
    display: block;
    color: #333;
  }

  .input input[type="text"],
  .input select,
  .input input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  .submit {
    text-align: center;
  }

  .submit input[type="submit"] {
    width: 100%;
    background-color: #35424a;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }

  .submit input[type="submit"]:hover {
    background-color: #e8491d;
  }
</style>

<body>
  <div class="container">
    <h1>Ubah Barang</h1>
    <div class="main">
      <form method="post" action="ubah.php" enctype="multipart/form-data">
        <div class="input">
          <label>Nama Barang</label>
          <input type="text" name="nama" value="<?php echo $data['nama']; ?>" />
        </div>
        <div class="input">
          <label>Katagori</label>
          <select name="Katagori">
            <option <?php echo is_select('Komputer', $data['Katagori']); ?> value="Komputer">Komputer</option>
            <option <?php echo is_select('Komputer', $data['Katagori']); ?> value="Elektronik">Elektronik</option>
            <option <?php echo is_select('Komputer', $data['Katagori']); ?> value="Hand Phone">Hand Phone</option>
          </select>
        </div>
        <div class="input">
          <label>Harga Jual</label>
          <input type="text" name="harga_jual" value="<?php echo $data['harga_jual']; ?>" />
        </div>
        <div class="input">
          <label>Harga Beli</label>
          <input type="text" name="harga_beli" value="<?php echo $data['harga_beli']; ?>" />
        </div>
        <div class="input">
          <label>Stok</label>
          <input type="text" name="stok" value="<?php echo $data['stok']; ?>" />
        </div>
        <div class="input">
          <label>File Gambar</label>
          <input type="file" name="file_gambar" />
        </div>
        <div class="submit">
          <input type="hidden" name="id" value="<?php echo $data['id_Barang']; ?>" />
          <input type="submit" name="submit" value="Simpan" />
        </div>
      </form>
    </div>
  </div>
</body>

</html>
<?php
include("konek.php");
// query untuk menampilkan data 
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($konek, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Data Barang</title>
</head>
<style>
  /* CSS untuk Tampilan Data Barang */

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

  table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 18px;
    text-align: left;
  }

  table th,
  table td {
    padding: 12px;
    border: 1px solid #dddddd;
  }

  table th {
    background-color: #35424a;
    color: white;
  }

  table tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  table tr:hover {
    background-color: #ddd;
  }

  img {
    width: 50px;
    height: 50px;
  }

  .button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color: #35424a;
    text-align: center;
    text-decoration: none;
    border: none;
    margin-top: 20px;
    cursor: pointer;
  }

  .button:hover {
    background-color: #e8491d;
  }

  button {
    background-color: inherit;
    border: none;
    color: inherit;
    font: inherit;
    cursor: pointer;
  }

  .edit {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color: #35424a;
    text-align: center;
    text-decoration: none;
    border: none;
    margin-top: 20px;
    cursor: pointer;
  }

  .edit:hover {
    background-color: #e8491d;
  }

  .delet {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color: #35424a;
    text-align: center;
    text-decoration: none;
    border: none;
    margin-top: 20px;
    cursor: pointer;
  }

  .delet:hover {
    background-color: #e8491d;
  }
</style>

<body>
  <div class="container">
    <h1>Data Barang</h1>
    <div class="main">
      <table>
        <tr>
          <th>Gambar</th>
          <th>Nama Barang</th>
          <th>Katagori</th>
          <th>Harga Jual</th>
          <th>Harga Beli</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
        <?php if ($result): ?>
          <?php while ($row = mysqli_fetch_array($result)): ?>
            <tr>
              <td><img src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>"></td>
              <td><?= $row['nama']; ?></td>
              <td><?= $row['Katagori']; ?></td>
              <td><?= $row['harga_beli']; ?></td>
              <td><?= $row['harga_jual']; ?></td>
              <td><?= $row['stok']; ?></td>
              <td>
                <a class="edit" href="ubah.php?id=<?php echo $row ['id_Barang']; ?>">Edit</a>
                <a class="delet" href="delet.php?id=<?php echo $row ['id_Barang']; ?>">Hapus Data</a>
              </td>
            </tr>
          <?php endwhile;
        else: ?>
          <tr>
            <td colspan="7">Belum ada data</td>
          </tr>
        <?php endif; ?>
      </table>
    </div>
  </div>
  <a href="tambah.php" class="button"><button>Tambah Data</button></a>
</body>

</html>
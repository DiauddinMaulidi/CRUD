<?php
    require "koneksi.php";

    $result = mysqli_query($conn, "SELECT * FROM tb_mhs");

    if ( isset($_POST["cari"]) ) {
        $result = mencari($_POST["keyword"]);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <style>
        .gambar {
            width: 50px;
            border-radius: 50%;
        }
    </style>
</head>
<body>

<h1>Daftar Mahasiswa</h1>
<a href="tambah.php">+ Tambah mahasiswa</a>
<br><br>

<form action="" method="post">
    <input type="text" name="keyword" id="keyword" autofocus placeholder="masukkan keyword..." autocomplete="off">
    <button type="submit" name="cari">Carii!</button>
</form>
<br>

<table border="1" cellpadding="20" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>Profil</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Prodi</th>
    </tr>
    <?php $i = 1; ?>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $i++ ?></td>
        <td>
            <a href="ubah.php?id=<?= $row["id"] ?>">ubah</a> | 
            <a href="hapus.php?id=<?= $row["id"] ?>&gambar=<?= $row["gambar"] ?>&aksi=hapus-gambar" onclick="return confirm('yakin');" >hapus</a>
        </td>
        <td><img src="img/tmp_file/<?= $row["gambar"] ?>" alt="gambar" class="gambar"></td>
        <td><?= $row["NIM"] ?></td>
        <td><?= $row["nama_mahasiswa"] ?></td>
        <td><?= $row["prodi"] ?></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
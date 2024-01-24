<?php
    require "koneksi.php";

    $id = $_GET["id"];
    $row = mysqli_query($conn, "SELECT * FROM tb_mhs WHERE id=$id");
    $result = mysqli_fetch_assoc($row);

    if ( isset($_POST["submit"]) ) {
        if ( ubah($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil diubah');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal diubah');
                    document.location.href = 'index.php';
                </script>
            ";
        }        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>

<h1>Ubah Data</h1>
    
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $result["id"] ?>">
    <input type="hidden" name="gambarLama" value="<?= $result["gambar"] ?>">
    <ul>
        <li>
            <label for="nim">NIM: </label>
            <input type="text" name="nim" id="nim" value="<?= $result['NIM'] ?>">
        </li>
        <li>
            <label for="nama">Nama: 
                <input type="text" name="nama" id="nama" value="<?= $result['nama_mahasiswa'] ?>" >
            </label>
        </li>
        <li>
            <label for="prodi">Prodi: </label>
            <input type="text" name="prodi" id="prodi" value="<?= $result['prodi'] ?>">
        </li>
        <li>
            <label for="gambar">Gambar: </label> <br>
            <img src="img/tmp_file/<?= $result["gambar"] ?>" alt="gambar" style="border-radius: 50%;" width="50"> <br>
            <input type="file" name="gambar" id="gambar">
        </li>
        <li>
            <button type="submit" name="submit">Update</button>
        </li>

    </ul>

</form>

</body>
</html>
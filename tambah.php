<?php
    require "koneksi.php";
    
    if ( isset($_POST["submit"]) ) {
       
        if (tambah($_POST) > 0) {
            echo "
                <script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal ditambahkan');
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

<h1>Tambah Data</h1>
    
<form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <label for="nim">NIM: </label>
            <input type="text" name="nim" id="nim">
        </li>
        <li>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" id="nama">
        </li>
        <li>
            <label for="prodi">Prodi: </label>
            <input type="text" name="prodi" id="prodi">
        </li>
        <li>
            <label for="gambar">Profil: </label>
            <input type="file" name="gambar" id="gambar" style="border: 1px solid;">
        </li>
        <br>
        <li>
            <button type="submit" name="submit">Tambah</button>
        </li>

    </ul>

</form>

</body>
</html>
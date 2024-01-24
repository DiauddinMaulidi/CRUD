<?php
    $conn = mysqli_connect("localhost", "root", "", "mahasiswa");


    function tambah($data) {
        global $conn;

        $nim = htmlspecialchars($data["nim"]);
        $nama = htmlspecialchars($data["nama"]);
        $prodi = htmlspecialchars($data["prodi"]);

        $gambar = upload();
        if (!$gambar) {
            return false;
        }

        mysqli_query($conn, "INSERT INTO tb_mhs VALUES (
            '', '$gambar','$nim', '$nama', '$prodi' )");

        return mysqli_affected_rows($conn);

    }

    function upload() {

        $namaFile = $_FILES['gambar']['name'];
        $tmptName = $_FILES['gambar']['tmp_name'];
        $error = $_FILES['gambar']['error'];
        $sizeFile = $_FILES['gambar']['size'];

        // cek apakah tidak ada gambar yang diupload
        if ($error === 4) {
            echo "
                <script>
                    alert('upload gambar bro!');
                </script>
            ";
            return false;
        }

        // cek yang diupload adalah gambar atau tidak
        $extensi = ['jpg', 'jpeg', 'png'];
        $extensiGambar = explode(".", $namaFile);
        $extensiGambar = strtolower(end($extensiGambar));

        if ( !in_array($extensiGambar, $extensi) ) {
            echo "
                <script>
                    alert('yang diupload bukan gambar bro!');
                </script>
            ";
            return false;
        }

        // cek ukuran gambar
        if ($sizeFile > 1000000) {
            echo "
                <script>
                    alert('ukuran gambar terlalu besar geng!!');
                </script>
            ";
            return false;
        }

        // lolos pengecekan
        $namaFileBaru = uniqid() . '-' . $namaFile;
        move_uploaded_file($tmptName, 'img/tmp_file/' . $namaFileBaru);
        return $namaFileBaru;
        

    }


    function hapus($id) {
        global $conn;

        $gambar = $_GET['gambar'];
    
        mysqli_query($conn, "DELETE FROM tb_mhs WHERE id=$id");
        if ($gambar) {
            unlink('img/tmp_file/' . $gambar);
        }

        return mysqli_affected_rows($conn);

    }


    function ubah($data) {
        global $conn;

        $id = $data["id"];
        $nim = htmlspecialchars($data['nim']);
        $nama = htmlspecialchars($data['nama']);
        $prodi = htmlspecialchars($data['prodi']);
        $gambarLama = htmlspecialchars($data['gambarLama']);
        
        // cek apakah user tidak memilih gambar baru
        if ( $_FILES['gambar']['error'] === 4 ) {
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
            if ($gambarLama) {
                @unlink('img/tmp_file/' . $gambarLama);
            }
        }
        mysqli_query($conn, "UPDATE tb_mhs SET
                                gambar = '$gambar',
                                NIM = '$nim',
                                nama_mahasiswa = '$nama',
                                prodi = '$prodi'
                                WHERE id = '$id'
                                ");

        return mysqli_affected_rows($conn);
    }


    function mencari($keyword) {
        global $conn;

        $hasil = mysqli_query($conn, "SELECT * FROM tb_mhs WHERE 
                                        NIM LIKE '%$keyword%' OR
                                        nama_mahasiswa LIKE '%$keyword%' OR
                                        prodi LIKE '%$keyword%'
                                        ");
        return $hasil;
    }


?>
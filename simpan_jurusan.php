<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form
$nm_jurusan = $_POST['nm_jurusan'];


	
// Rename nama fotonya dengan menambahkan tanggal dan jam upload

	// Proses simpan ke Database
	$cek = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM jurusan WHERE nm_jurusan='$nm_jurusan'"));
    if ($cek > 0){
    echo "<script>window.alert('nama kelas yang anda masukan sudah ada')
    window.location='from_jurusan.php'</script>";
    }else {
     mysqli_query($connect,"INSERT INTO jurusan(id_jurusan,nm_jurusan)
    VALUES ('','$nm_jurusan')");
 
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='tabel_jurusan.php'</script>";
    }

?>

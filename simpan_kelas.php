<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form
$nm_kelas = $_POST['nm_kelas'];
$tingkatan = $_POST['tingkatan'];
$id_jurusan = $_POST['id_jurusan'];
// Rename nama fotonya dengan menambahkan tanggal dan jam upload

$cek = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM kelas WHERE nm_kelas='$nm_kelas' AND tingkatan='$tingkatan' AND id_jurusan='$id_jurusan'"));
    if ($cek > 0){
    echo "<script>window.alert('nama kelas yang anda masukan sudah ada')
    window.location='from_kelas.php'</script>";
    }else {
     mysqli_query($connect,"INSERT INTO kelas(id_kelas,nm_kelas,tingkatan,id_jurusan)
    VALUES ('','$nm_kelas','$tingkatan','$id_jurusan')");
 
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='tabel_kelas.php'</script>";
    }
    

	// Proses simpan ke Databas

?>

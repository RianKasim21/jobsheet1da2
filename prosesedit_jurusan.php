<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$id_jurusan = $_GET['id_jurusan'];

// Ambil Data yang Dikirim dari Form
$nm_jurusan = $_POST['nm_jurusan'];



	$query = "UPDATE jurusan SET nm_jurusan='".$nm_jurusan."' WHERE id_jurusan='".$id_jurusan."'";
	$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: index.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
?>

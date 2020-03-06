<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$id_kelas = $_GET['id_kelas'];

// Ambil Data yang Dikirim dari Form
$nm_kelas = $_POST['nm_kelas'];
$tingkatan = $_POST['tingkatan'];
$id_jurusan = $_POST['id_jurusan'];


	$query = "UPDATE kelas SET nm_kelas='".$nm_kelas."',tingkatan='".$tingkatan."',id_jurusan='".$id_jurusan."' WHERE id_kelas='".$id_kelas."'";
	$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: tabel_kelas.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='edit_kelas.php'>Kembali Ke Form</a>";
	}
?>

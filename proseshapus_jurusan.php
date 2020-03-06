<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data NIS yang dikirim oleh index.php melalui URL
$id_jurusan = $_GET['id_jurusan'];

// Query untuk menampilkan data jurusan berdasarkan NIS yang dikirim
$query = "SELECT * FROM jurusan WHERE id_jurusan='".$id_jurusan."'";
$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

// Query untuk menghapus data jurusan berdasarkan NIS yang dikirim
$query2 = "DELETE FROM jurusan WHERE id_jurusan='".$id_jurusan."'";
$sql2 = mysqli_query($connect, $query2); // Eksekusi/Jalankan query dari variabel $query

if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
	// Jika Sukses, Lakukan :
	header("location: tabel_jurusan.php"); // Redirect ke halaman index.php
}else{
	// Jika Gagal, Lakukan :
	echo "Data gagal dihapus. <a href='index.php'>Kembali</a>";
}
?>

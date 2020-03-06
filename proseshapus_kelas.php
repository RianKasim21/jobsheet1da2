<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data NIS yang dikirim oleh index.php melalui URL
$id_kelas = $_GET['id_kelas'];

// Query untuk menampilkan data kelas berdasarkan NIS yang dikirim
$query = "SELECT * FROM kelas WHERE id_kelas='".$id_kelas."'";
$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

// Query untuk menghapus data kelas berdasarkan NIS yang dikirim
$query2 = "DELETE FROM kelas WHERE id_kelas='".$id_kelas."'";
$sql2 = mysqli_query($connect, $query2); // Eksekusi/Jalankan query dari variabel $query

if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
	// Jika Sukses, Lakukan :
	header("location: tabel_kelas.php"); // Redirect ke halaman index.php
}else{
	// Jika Gagal, Lakukan :
	echo "Data gagal dihapus. <a href='tabel_kelas.php'>Kembali</a>";
}
?>

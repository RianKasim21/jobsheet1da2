<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($connect,"select * from siswa where nisn='$nisn' and nama='$nama'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin

		// buat session login dan username
		$_SESSION['nisn'] = $nisn;
		$_SESSION['nama'] = $nama;
		// alihkan ke halaman dashboard admin
		header("location:halaman_siswa.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:login_siswa.php?pesan=gagal");
	}



?>
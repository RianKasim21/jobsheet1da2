<?php 
session_start();
if($_SESSION['nisn']==""){
	header("location:login_siswa.php?pesan=gagal");
	
}
 ?>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="tutorial-boostrap-merubaha-warna">
	<meta name="author" content="ilmu-detil.blogspot.com">
	<title>Tutorial Boostrap </title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	
	
	
	
	
	
	<style type="text/css">
	.navbar-default {
		background-color: #e9967a;
		font-size:18px;
		color:#ffffff;
	}
	

	
	
	</style>
</head>
<body>
	
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a>Rian Kasim R</a></li>
      <li><a href="tabel_siswa.php">Tabel Siswa</a></li>
       </ul>
<ul class="nav navbar-nav navbar-right">
     <li> <a class="icon-plus" href="logout.php"><i class="icon-plus"></i>LOG OUT</a></li>
      </ul>
  </div><!-- /.navbar-collapse -->
</nav>

<!-- /.navbar -->

<div class="container">
	<div class="btn-toolbar">
		<p>Halo <b><?php echo $_SESSION['nama']; ?></b> Anda telah login sebagai Siswa <b>
			<br>
	</div>
</div>
<br>
<div class="container">
	<div class ="row">
		<div class="col-md-15">
			<table class="table table-striped table-bordered table-hover bg-danger">
	<tr>
		<th>NO</th>
		<th>NISN</th>
		<th>Nama</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Agama</th>
		<th>Jenis kelamin</th>
		<th>Alamat</th>
		<th>No Hp</th>
		<th>Nama Kelas</th>
		<th>Tingkatan</th>
		<th>Nama Jurusan</th>
		<th>Foto</th>
	</tr>
	<?php
	// Load file koneksi.php
	include "koneksi.php";
	$id=$_SESSION['nisn'];
	$no =1;
	$query = "SELECT siswa.id_siswa,siswa.nisn,siswa.nama,siswa.tmp_lahir,siswa.tgl_lahir,siswa.agama,siswa.gender,siswa.alamat,siswa.no_hp,siswa.id_kelas,siswa.foto,kelas.id_kelas,kelas.nm_kelas,kelas.tingkatan,kelas.id_jurusan,jurusan.id_jurusan,jurusan.nm_jurusan FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan where siswa.nisn='$id'"; // Query untuk menampilkan semua data siswa
	$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
	
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td>".$no++;"</td>";
		echo "<td>".$data['nisn']."</td>";
		echo "<td>".$data['nama']."</td>";
		echo "<td>".$data['tmp_lahir']."</td>";
		echo "<td>".$data['tgl_lahir']."</td>";
		echo "<td>".$data['agama']."</td>";
		echo "<td>".$data['gender']."</td>";
		echo "<td>".$data['alamat']."</td>";
		echo "<td>".$data['no_hp']."</td>";
		echo "<td>".$data['nm_kelas']."</td>";
		echo "<td>".$data['tingkatan']."</td>";
		echo "<td>".$data['nm_jurusan']."</td>";
		echo "<td><img src='images/".$data['foto']."' width='50' height='50'></td>";
		echo '</tr>';
	}
	?>
	</table>
</body>
</html>

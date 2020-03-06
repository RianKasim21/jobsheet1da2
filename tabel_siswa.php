<?php 
session_start();
if($_SESSION['id_level']==""){
	header("location:index.php?pesan=gagal");
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
		<script type="text/javascript" src="aset/js/jquery.min.js"></script>
	<script type="text/javascript" src="aset/js/bootstrap.min.js"></script>
	
	
	
	
	
	
	<style type="text/css">
	.navbar-default {
		background-color: #e9967a;
		font-size:18px;
		color:#ffffff;
	}
	

	
	
	</style>
</head>
<body>
	
	
 <nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">				
				<li class="active"><a href="#">Rian Kasim R<span class="sr-only">(current)</span></a></li>
				<li><a href="tabel_siswa.php">Tabel Siswa</a></li>
				<li><a href="tabel_kelas.php">Tabel Kelas</a></li> 
				<li><a href="tabel_jurusan.php">Tabel Jurusan</a></li> 
			</ul>
				<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"><span class=""></span>LOG OUT</a></li>
			</ul>
		</nav>
<!-- /.navbar -->

<div class="container">
	<div class="btn-toolbar">
		<p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai Admin <b>
			<br>
		<a class="btn btn-warning" href="print.php" target="blank"><i class="icon-plus"></i>+ PRINT</a>
		<a class="btn btn-warning" href="index_exports.php"><i class="icon-plus"></i>EXPORT</a>
		<a class="btn btn-warning" href="upload.php"><i class="icon-plus"></i>+ IMPORT</a>
		<a class="btn btn-warning" href="from_siswa.php"><i class="icon-plus"></i>+Tambah Siswa</a>
	</div>
</div>

<?php 
if(isset($_GET['berhasil'])){
		echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
	} ?>
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
		<th colspan="2">Aksi</th>
	</tr>
	<?php
	// Load file koneksi.php
	include "koneksi.php";
	$no =1;
	$query = "SELECT siswa.id_siswa,siswa.nisn,siswa.nama,siswa.tmp_lahir,siswa.tgl_lahir,siswa.agama,siswa.gender,siswa.alamat,siswa.no_hp,siswa.id_kelas,siswa.foto,kelas.id_kelas,kelas.nm_kelas,kelas.tingkatan,kelas.id_jurusan,jurusan.id_jurusan,jurusan.nm_jurusan FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan order by nm_kelas,tingkatan,nama "; // Query untuk menampilkan semua data siswa
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
		echo '<td>
		<a class="btn btn-xs btn-primary" href="edit_siswa.php?id_siswa='.$data['id_siswa'].'">Ubah</a>
		<a class="btn btn-xs btn-danger" href="proseshapus_siswa.php?id_siswa='.$data['id_siswa'].'">Hapus</a>
		<a class="btn btn-xs btn-success" target="_blank" href="print_siswa.php?id_siswa='.$data['id_siswa'].'">cetaks</a></td>
		</td>';
		echo '</tr>';
	}
	?>
	</table>
</body>
</html>

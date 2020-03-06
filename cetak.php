<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA DARI DATABASE DENGAN PHP </title>
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

	<center>

		<h2>DATA LAPORAN SISWA SMK LUGINA</h2>
		
	</center>

	<?php 
	include 'koneksi.php';
	?>
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
		<th>No Hp</th>
		<th>Nama Kelas</th>
		<th>Tingkatan</th>
		<th>Nama Jurusan</th>
		<th>Foto</th>
	</tr>
		<?php 
		include "koneksi.php";
		$id = $_GET['id_kelas'];
		$no =1;
		$query = "SELECT siswa.id_siswa,siswa.nisn,siswa.nama,siswa.tmp_lahir,siswa.tgl_lahir,siswa.agama,siswa.gender,siswa.alamat,siswa.no_hp,siswa.id_kelas,siswa.foto,kelas.id_kelas,kelas.nm_kelas,kelas.tingkatan,kelas.id_jurusan,jurusan.id_jurusan,jurusan.nm_jurusan FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan where kelas.id_kelas='$id' ";
		$sql = mysqli_query($connect, $query);
		while($data = mysqli_fetch_array($sql)){
		?> 
		<tr>
			<td><?= $no++; ?></td>
        <td><?=$data['nisn']?></td>
        <td><?=$data['nama']?></td>
         <td><?=$data['tmp_lahir']?></td>
         <td><?=$data['tgl_lahir']?></td>
         <td><?=$data['agama']?></td>
         <td><?=$data['gender']?></td>
         <td><?=$data['no_hp']?></td>
         <td><?=$data['nm_kelas']?></td>
         <td><?=$data['tingkatan']?></td>
         <td><?=$data['nm_jurusan']?></td>
		<td><center><img src="images/<?=$data['foto']?>" width="50" height="50"></center></td>
		</tr>
		<?php 
		}
		?>
	</table>

	<script>
		window.print();
	</script>

</body>
</html>
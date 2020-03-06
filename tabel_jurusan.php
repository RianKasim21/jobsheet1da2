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
    color:#f0ffff;
  }
  

  
  
  </style>
</head>
<body>
	
  
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Rian Kasim R</a></li>
      <li><a href="tabel_siswa.php">Tabel Siswa</a></li>
      <li><a href="tabel_kelas.php">Tabel Kelas</a></li>
      <li><a href="tabel_jurusan.php">Tabel Jurusan</a></li>
       </ul>
<ul class="nav navbar-nav navbar-right">
     <li> <a class="icon-plus" href="logout.php"><i class="icon-plus"></i>LOG OUT</a></li>
      </ul>
  </div><!-- /.navbar-collapse -->
</nav>

<!-- /.navbar -->

<div class="container">
	<div class="btn-toolbar">
		<a class="btn btn-warning" href="from_jurusan.php"><i class="icon-plus"></i>+Tambah Jurusan</a>
	</div>
</div>
<br>
<div class="container">
  <div class ="row">
    <div class="col-md-12">
      <table class="table table-striped table-bordered table-hover bg-danger">
	<tr>
		<th>NO</th>
		<th>Nama Jurusan</th>
		<th colspan="2">Aksi</th>
	</tr>
	<?php
	// Load file koneksi.php
	include "koneksi.php";
	$no =1;
	$query = "SELECT * FROM jurusan"; // Query untuk menampilkan semua data siswa
	$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
	
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td>".$no++;"</td>";
		echo "<td>".$data['nm_jurusan']."</td>";
		echo '<td>
		<a class="btn btn-xs btn-primary" href="edit_jurusan.php?id_jurusan='.$data['id_jurusan'].'">Ubah</a>
		<a class="btn btn-xs btn-danger" href="proseshapus_jurusan.php?id_jurusan='.$data['id_jurusan'].'">Hapus</a></td>
		</td>';
		echo "</tr>";
	}
	?>
	</table>
</body>
</html>

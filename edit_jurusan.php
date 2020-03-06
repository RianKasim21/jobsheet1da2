<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="tutorial-boostrap-merubaha-warna">
	<meta name="author" content="ilmu-detil.blogspot.com">
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
	</style>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Rian Kasim R</a></li>
      <li><a href="Tabel_jurusan.php">Tabel Jurusan</a></li>
  </div><!-- /.navbar-collapse -->
</nav>

   <div class="container">
        <div class="row">
		<div class="col-sm-5 col-sm-offset-3"><h3>Edit Jurusan</h3>
	
	<?php
	// Load file koneksi.php
	include "koneksi.php";
	
	// Ambil data NIS yang dikirim oleh index.php melalui URL
	$id_jurusan = $_GET['id_jurusan'];
	
	// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
	$query = "SELECT * FROM jurusan WHERE id_jurusan='".$id_jurusan."'";
	$sql = mysqli_query($connect, $query);  // Eksekusi/Jalankan query dari variabel $query
	$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
	?>
	
	<form method="post" action="prosesedit_jurusan.php?id_jurusan=<?php echo $id_jurusan; ?>" enctype="multipart/form-data">
	<table cellpadding="8">
	<div class="form-group">
				<label for="nm_jurusan">Nama Jurusan</label>
				<input type="text" required="required" class="form-control" id="nm_jurusan" name="nm_jurusan" value="<?php echo $data['nm_jurusan']; ?>">
				<span class="help-block"></span>
			</div>
	<tr>
	</table>
	
	<hr>
	<input type="submit" value="Ubah">
	<a href="tabel_jurusan.php"><input type="button" value="Batal"></a>
	</form>
</body>
</html>

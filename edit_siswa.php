<html>
<head>
	<title>CRUD Rian</title>
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
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Rian Kasim R</a></li>
      <li><a href="tabel_siswa.php">Tabel Siswa</a></li>
  </div><!-- /.navbar-collapse -->
</nav>

   <div class="container">
        <div class="row">
		<div class="col-sm-5 col-sm-offset-3"><h3>Edit Siswa</h3>
	
	<?php
	// Load file koneksi.php
	include "koneksi.php";
	
	// Ambil data NIS yang dikirim oleh index.php melalui URL
	$id_siswa = $_GET['id_siswa'];
	
	// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
	$query = "SELECT * FROM siswa WHERE id_siswa='".$id_siswa."'";
	$sql = mysqli_query($connect, $query);  // Eksekusi/Jalankan query dari variabel $query
	$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
	?>
	
	<form method="post" action="prosesedit_siswa.php?id_siswa=<?php echo $id_siswa; ?>" enctype="multipart/form-data">
	<table cellpadding="8">
			
			<div class="form-group">
				<label for="nisn">NISN</label>
				<input type="number" required="required" class="form-control" id="nisn" name="nisn" value="<?php echo $data['nisn']; ?>">
				<span class="help-block"></span>
			</div>
			
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" required="required" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>">
				<span class="help-block"></span>
			</div>
			
			<div class="form-group">
				<label for="tmp_lahir">Tempat Lahir</label>
				<input type="text" required="required" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?php echo $data['tmp_lahir']; ?>">
				<span class="help-block"></span>
			</div>
			
			<div class="form-group">
				<label for="tgl_lahir">Tanggal Lahir</label>
				<input type="date" required="required" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>">
				<span class="help-block"></span>
			</div>
			
			<div class="form-group">
				<label for="agama">agama</label>
				<input type="text" required="required" class="form-control" id="agama" name="agama" value="<?php echo $data['agama']; ?>">
				<span class="help-block"></span>
			</div>

				<div class="form-group">
					<label for="gender">Jenis Kelamin</label>
					<select class="form-control" required="required" id="gender" name="gender">
						<option>pilih</option>
						<option value="Laki-Laki" <?php if($data['gender'] == 'Laki-Laki'){echo 'selected';} ?>>Laki-Laki</option>
						<option value="Perempuan" <?php if($data['gender'] == 'Perempuan'){echo 'selected';} ?>>Perempuan</option>
					</select>
					<span class="help-block"></span>
        		</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<input type="text" required="required" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>">
				<span class="help-block"></span>
			</div>
			
			<div class="form-group">
				<label for="no_hp">No Hp</label>
				<input type="text" required="required" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data['no_hp']; ?>">
				<span class="help-block"></span>
			</div>
	
		<div class="from-group">
  		<span>Nama Kelas</span>
 	 	<select class="form-control" required="required" id="id_kelas" name="id_kelas">
      <?php 
      include 'koneksi.php';
      $result = mysqli_query($connect,"select * from kelas");
      while($d = mysqli_fetch_array($result)){
        ?>
      <option value="<?php echo $d['id_kelas']; ?>" <?php echo $data['id_kelas'] === $d['id_kelas'] ? "selected" : "" ?>><?php echo $d['nm_kelas']; ?>-<?php echo $d['tingkatan']; ?>
      </option>
        <?php 

        } ?>
	<tr>
		<td>Foto</td>
		<td>
			<input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
			<input type="file" name="foto">
		</td>
	</tr>
	</table>
	
	<hr>
	<input type="submit" value="Ubah">
	<a href="tabel_siswa.php"><input type="button" value="Batal"></a>
	</form>
</body>
</html>

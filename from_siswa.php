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
      <li><a href="index.php">Tabel Siswa</a></li>
  </div><!-- /.navbar-collapse -->
</nav>

   <div class="container">
        <div class="row">
		<div class="col-sm-5 col-sm-offset-3"><h3>Tambah Siswa</h3>

	<form method="post" action="simpan_siswa.php" enctype="multipart/form-data">
	<table cellpadding="8">

			<div class="form-group">
				<label for="nisn">NISN</label>
				<input type="text" required="required" class="form-control" id="nisn" name="nisn">
				<span class="help-block"></span>
			</div>

			<div class="form-group">
				<label for="nama">Nama Siswa</label>
				<input type="text" required="required" class="form-control" id="nama" name="nama" >
				<span class="help-block"></span>
			</div>

			<div class="form-group">
				<label for="tmp_lahir">Tempat Lahir</label>
				<input type="text" required="required" class="form-control" id="tmp_lahir" name="tmp_lahir" >
				<span class="help-block"></span>
			</div>

			<div class="form-group">
				<label for="tgl_lahir">Tanggal Lahir</label>
				<input type="date" required="required" class="form-control" id="tgl_lahir" name="tgl_lahir" >
				<span class="help-block"></span>
			</div>

			<div class="form-group">
				<label for="agama">Agama</label>
				<input type="text" required="required" class="form-control" id="agama" name="agama" >
				<span class="help-block"></span>
			</div>

			<div class="form-group">
					<label for="gender">Jenis Kelamin</label>
					<select class="form-control" required="required" id="gender" name="gender" >
						<option>--Pilih Jenis Kelamin--</option>
						<option value="Laki-Laki">Laki-Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
					<span class="help-block"></span>
        		</div>

			<div class="form-group">
				<label for="alamat">Alamat</label>
				<input type="text" required="required" class="form-control" id="alamat" name="alamat" >
				<span class="help-block"></span>
			</div>

			<div class="form-group">
				<label for="no_hp">No Hp</label>
				<input type="number" required="required" class="form-control" id="no_hp" name="no_hp" >
				<span class="help-block"></span>
			</div>

			<div class="form-group">
          <label for="id_kelas">Nama Kelas</label>
          <select class="form-control" required="required" id="id_kelas" name="id_kelas" >
           <option>
      Pilih Kelas
    </option>
      <?php 
      include 'koneksi.php';
      $data = mysqli_query($connect,"select * from Kelas");
      while($d = mysqli_fetch_array($data)){
        ?>
      <option value="<?php echo $d['id_kelas']; ?>">
        <?php echo $d['nm_kelas']; ?>
        <?php echo $d['tingkatan']; ?>

      </option>
      
        <?php 

        } ?>
          </select>
          <span class="help-block"></span>
            </div>
    </select>
	<br>
	<tr>
		<td>Foto</td>
		<td><input type="file" name="foto"></td>
	</tr>
	</table>
	
	<hr>
	<input type="submit" value="Simpan">
	<a href="index.php"><input type="button" value="Batal"></a>
	</form>
</body>
</html>

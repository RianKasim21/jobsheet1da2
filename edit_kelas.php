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
      <li><a href="tabel_kelas.php">Tabel Kelas</a></li>
  </div><!-- /.navbar-collapse -->
</nav>

   <div class="container">
        <div class="row">
		<div class="col-sm-5 col-sm-offset-3"><h3>Edit Kelas</h3>
	
	<?php
	// Load file koneksi.php
	include "koneksi.php";
	
	// Ambil data NIS yang dikirim oleh index.php melalui URL
	$id_kelas = $_GET['id_kelas'];
	
	// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
	$query = "SELECT * FROM kelas WHERE id_kelas";
	$sql = mysqli_query($connect, $query);  // Eksekusi/Jalankan query dari variabel $query
	$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
	?>
	
	<form method="post" action="prosesedit_kelas.php?id_kelas=<?php echo $id_kelas; ?>" enctype="multipart/form-data">
	<table cellpadding="8">

	<div class="form-group">
				<label for="nm_kelas">Nama Kelas</label>
				<input type="text" required="required" class="form-control" id="nm_kelas" name="nm_kelas" value="<?php echo $data['nm_kelas']; ?>">
				<span class="help-block"></span>
			</div>

	<div class="form-group">
          <label for="tingkatan">Tingkatan</label>
          <select class="form-control" required="required" id="tingkatan" name="tingkatan" >
            <option>--Pilih Tingkatan--</option>
            <option value="X" <?php if($data['tingkatan'] == 'X'){echo 'selected';} ?>>10</option>
            <option value="XI" <?php if($data['tingkatan'] == 'XI'){echo 'selected';} ?>>11</option>
            <option value="XII" <?php if($data['tingkatan'] == 'XII'){echo 'selected';} ?>>12</option>
          </select>
          <span class="help-block"></span>
            </div>

           <div class="from-group">
  		<span>Nama Jurusan</span>
 	 	<select class="form-control" required="required" id="id_jurusan" name="id_jurusan">
      <?php 
      include 'koneksi.php';
      $result = mysqli_query($connect,"select * from jurusan");
      while($d = mysqli_fetch_array($result)){
        ?>
      <option value="<?php echo $d['id_jurusan']; ?>" <?php echo $data['id_jurusan'] === $d['id_jurusan'] ? "selected" : "" ?>><?php echo $d['nm_jurusan']; ?>
      </option>
        <?php 

        } ?>
    </div>

  </td>
	<tr>
	</table>
	
	<hr>
	<input type="submit" value="Ubah">
	<a href="tabel_kelas.php"><input type="button" value="Batal"></a>
	</form>
</body>
</html>

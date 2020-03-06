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

  <!-- Collect the nav links, forms, and other content for toggling -->
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
    <div class="col-sm-5 col-sm-offset-3"><h3>Tambah Kelas</h3>

	<form method="post" action="simpan_kelas.php" enctype="multipart/form-data">
	<table cellpadding="8">

    <div class="form-group">
          <label for="id_jurusan">Nama Jurusan</label>
          <select class="form-control" required="required" id="id_jurusan" name="id_jurusan" >
           <option>
      Pilih Jurusan
    </option>
      <?php 
      include 'koneksi.php';
      $data = mysqli_query($connect,"select * from jurusan");
      while($d = mysqli_fetch_array($data)){
        ?>
      <option value="<?php echo $d['id_jurusan']; ?>">
        <?php echo $d['nm_jurusan']; ?>

      </option>
      
        <?php 

        } ?>
          </select>
          <span class="help-block"></span>
            </div>

 <div class="form-group">
        <label for="nm_kelas">Nama Kelas</label>
        <input type="text" required="required" class="form-control" id="nm_kelas" name="nm_kelas" >
        <span class="help-block"></span>
      </div>

	<div class="form-group">
          <label for="tingkatan">Tingkatan</label>
          <select class="form-control" required="required" id="tingkatan" name="tingkatan" >
            <option>--Pilih Tingkatan--</option>
            <option value="X">10</option>
            <option value="XI">11</option>
            <option value="XII">12</option>
          </select>
          <span class="help-block"></span>
            </div>
	</table>
	<br>
	<input type="submit" value="Simpan">
  <a href="tabel_kelas.php"><input type="button" value="Batal"></a>
	</form>
</body>
</html>

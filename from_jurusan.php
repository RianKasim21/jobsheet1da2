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
      <li><a href="Tabel_jurusan.php">Tabel Jurusan</a></li>
  </div><!-- /.navbar-collapse -->
</nav>

<div class="container">
        <div class="row">
    <div class="col-sm-5 col-sm-offset-3"><h3>Tambah Jurusan</h3>

	<form method="post" action="simpan_jurusan.php" enctype="multipart/form-data">
	<table cellpadding="8">

	 <div class="form-group">
        <label for="nm_jurusan">Nama Jurusan</label>
        <input type="text" required="required" class="form-control" id="nm_jurusan" name="nm_jurusan" >
        <span class="help-block"></span>
      </div>
	</table>
	
	<hr>
	<input type="submit" value="Simpan">
  <a href="Tabel_jurusan.php"><input type="button" value="Batal"></a>
	</form>
</body>
</html>

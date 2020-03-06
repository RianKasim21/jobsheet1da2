<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
 
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
 
		<form action="cek_login_siswa.php" method="post">
			<label>nisn</label>
			<input type="text" name="nisn" class="form_login" placeholder="" required="required">
			<label>nama</label>
			<input type="text" name="nama" class="form_login" placeholder="" required="required">
 
			<input type="submit" class="tombol_login" value="LOGIN">
			<br>
 
			<br/>
			<br/>
			<center>
			</center>
		</form>
		
	</div>
 
 
</body>
</html>
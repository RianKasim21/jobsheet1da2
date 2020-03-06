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
		<p class="tulisan_login">login Sebagai Admin</p>
 
		<form action="cek_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="" required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="" required="required">
 
			<input type="submit" class="tombol_login" value="LOGIN">
			<br>
			<a href="login_siswa.php"><h3>Login Siswa</h3></a>
 
			<br/>
			<br/>
			<center>
			</center>
		</form>
		
	</div>
 
 
</body>
</html>
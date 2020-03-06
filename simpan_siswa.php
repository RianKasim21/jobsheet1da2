<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$tmp_lahir = $_POST['tmp_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$agama = $_POST['agama'];
$gender = $_POST['gender'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$id_kelas = $_POST['id_kelas'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
	
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "images/".$fotobaru;

// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	// Proses simpan ke Database
	$cek = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM siswa WHERE nisn='$nisn'"));
    if ($cek > 0){
    echo "<script>window.alert('nisn atau nama yang anda masukan sudah ada')
    window.location='from_siswa.php'</script>";
    }else {
	 mysqli_query($connect,"INSERT INTO siswa(id_siswa,nisn,nama,tmp_lahir,tgl_lahir,agama,gender,alamat,no_hp,id_kelas,foto)
    VALUES ('','$nisn','$nama','$tmp_lahir','$tgl_lahir','$agama','$gender','$alamat','$no_hp','$id_kelas','$fotobaru')");
 
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='tabel_siswa.php'</script>";
    } // Eksekusi/ Jalankan query dari variabel $query
     // Redirect ke halaman index.php
}else{
	// Jika gambar gagal diupload, Lakukan :
	echo "Maaf, Gambar gagal untuk diupload.";
	echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
?>

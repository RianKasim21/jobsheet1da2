<!-- import excel ke mysql -->
<!-- www.malasngoding.com -->

<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['filepegawai']['name']) ;
move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filepegawai']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nisn     = $data->val($i, 1);
	$nama   = $data->val($i, 2);
	$tmp_lahir  = $data->val($i, 3);
	$tgl_lahir  = $data->val($i, 4);
	$agama  = $data->val($i, 5);
	$gender  = $data->val($i, 6);
	$alamat  = $data->val($i, 7);
	$no_hp  = $data->val($i, 8);
	$id_kelas  = $data->val($i, 9);
	$foto  = $data->val($i, 10);

	$fotobaru = date('dmYHis').$foto;

	$path = "images/".$fotobaru;

	if($nisn != "" && $nama != "" && $tmp_lahir != "" && $tgl_lahir != "" && $agama != "" && $gender != "" && $alamat != "" && $no_hp != "" && $id_kelas != "" && $foto != ""){
		// input data ke database (table data_pegawai)
		$cek = mysqli_num_rows(mysqli_query($connect,"SELECT siswa.id_siswa,siswa.nisn,siswa.nama,siswa.tmp_lahir,siswa.tgl_lahir,siswa.agama,siswa.gender,siswa.alamat,siswa.no_hp,siswa.id_kelas,siswa.foto,kelas.id_kelas,kelas.nm_kelas,kelas.tingkatan,kelas.id_jurusan,jurusan.id_jurusan,jurusan.nm_jurusan FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan order by tingkatan WHERE nisn='$nisn'"));
		 if ($cek > 0){
    echo "<script>window.alert('nisn sudah ada')
    window.location='tabel_siswa.php'</script>";
    }else {
		mysqli_query($connect,"INSERT INTO siswa(id_siswa,nisn,nama,tmp_lahir,tgl_lahir,agama,gender,alamat,no_hp,id_kelas,foto)
    VALUES ('','$nisn','$nama','$tmp_lahir','$tgl_lahir','$agama','$gender','$alamat','$no_hp','$id_kelas','$foto')");
		$berhasil++;
	}
}
}
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);

// alihkan halaman ke index.php
header("location:tabel_siswa.php?berhasil=$berhasil");
?>
<?php

require_once __DIR__ . '/vendor/autoload.php';


$mpdf = new \Mpdf\Mpdf();

$html = '
<html>
<head>
	<title></title>
</head>
<body>
	<h1 style="text-align: center;">Data Siswa</h1>
		<table border="1">
			<tr>
				<th>NO</th>
				<th>NISN</th>
				<th>Nama</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Agama</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
				<th>NO Hp</th>
				<th>Nama Kelas</th>
				<th>Tingkatan</th>
				<th>Nama Jurusan</th>
				<th>Foto</th>
			</tr>';

		include "koneksi.php";
		$no =1;
		$query = "SELECT siswa.id_siswa,siswa.nisn,siswa.nama,siswa.tmp_lahir,siswa.tgl_lahir,siswa.agama,siswa.gender,siswa.alamat,siswa.no_hp,siswa.id_kelas,siswa.foto,kelas.id_kelas,kelas.nm_kelas,kelas.tingkatan,kelas.id_jurusan,jurusan.id_jurusan,jurusan.nm_jurusan FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan order by nama"; // Query untuk menampilkan semua data siswa
		$sql = mysqli_query($connect, $query);
	
		while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
			$html .= '<tr>
					<td>'. $no++.'</td>
					<td>'. $data["nisn"] .'</td>
					<td>'. $data["nama"] .'</td>
					<td>'. $data["tmp_lahir"] .'</td>
					<td>'. $data["tgl_lahir"] .'</td>
					<td>'. $data["agama"] .'</td>
					<td>'. $data["gender"] .'</td>
					<td>'. $data["alamat"] .'</td>
					<td>'. $data["no_hp"] .'</td>
					<td>'. $data["nm_kelas"] .'</td>
					<td>'. $data["tingkatan"] .'</td>
					<td>'. $data["nm_jurusan"] .'</td>
					"<td><img src="images/'.$data["foto"].'"  width="50" height="50"></td>


			</tr>';
		}

$html .= '</table>	
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();
?>

<?php
include "koneksi.php"; // Load file koneksi.php

$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
$limit = $_POST['length']; // Ambil data limit per page
$start = $_POST['start']; // Ambil data start

$sql = mysqli_query($connect, "SELECT kelas.id_kelas,kelas.nm_kelas,kelas.tingkatan,jurusan.id_jurusan,jurusan.nm_jurusan FROM kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan"); // Query untuk menghitung seluruh data siswa
$sql_count = mysqli_num_rows($sql); // Hitung data yg ada pada query $sql

$query = "SELECT kelas.id_kelas,kelas.nm_kelas,kelas.tingkatan,jurusan.id_jurusan,jurusan.nm_jurusan FROM kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan(id_kelas LIKE '%".$search."%' OR nm_kelas LIKE '%".$search."%' OR tingkatan LIKE '%".$search."%')";
$order_field = $_POST['order'][0]['column']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
$order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;

$sql_data = mysqli_query($connect, $query.$order." LIMIT ".$limit." OFFSET ".$start); // Query untuk data yang akan di tampilkan
$sql_filter = mysqli_query($connect, $query); // Query untuk count jumlah data sesuai dengan filter pada textbox pencarian
$sql_filter_count = mysqli_num_rows($sql_filter); // Hitung data yg ada pada query $sql_filter

$data = mysqli_fetch_all($sql_data, MYSQLI_ASSOC); // Untuk mengambil data hasil query menjadi array
$callback = array(
    'draw'=>$_POST['draw'], // Ini dari datatablenya
    'recordsTotal'=>$sql_count,
    'recordsFiltered'=>$sql_filter_count,
    'data'=>$data
);

header('Content-Type: application/json');
echo json_encode($callback); // Convert array $callback ke json
?>

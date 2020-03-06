<?php 
session_start();
if($_SESSION['nisn']==""){
  header("location:login_siswa.php?pesan=gagal");
  
}
 ?>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="tutorial-boostrap-merubaha-warna">
  <meta name="author" content="ilmu-detil.blogspot.com">
  <title>Tutorial Boostrap </title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script type="text/javascript" src="aset/js/jquery.min.js"></script>
  <script type="text/javascript" src="aset/js/bootstrap.min.js"></script>
  
  
  
  
  
  
  <style type="text/css">
  .navbar-default {
    background-color: #e9967a;
    font-size:18px;
    color:#ffffff;
  }
  

  
  
  </style>
</head>














<body>
  
  
  
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">       
        <li class="active"><a href="#">Rian Kasim R<span class="sr-only">(current)</span></a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class=""></span>LOG OUT</a></li>
      </ul>
    </nav>
<!-- /.navbar -->
   <center> <p>Halo <b><?php echo $_SESSION['nama']; ?></b> Anda telah login sebagai Siswa <b></center>
<div class="container">
  <div class ="row">
    <div class="col-md-15">
      <table class="table table-striped table-bordered table-hover bg-danger">
      
                           
            
                           
  
  <?php
  // Load file koneksi.php
  include "koneksi.php";
  $id=$_SESSION['nisn'];
  
  
  $sql = mysqli_query($connect,"SELECT siswa.id_siswa,siswa.nisn,siswa.nama,siswa.tmp_lahir,siswa.tgl_lahir,siswa.agama,siswa.gender,siswa.alamat,siswa.no_hp,siswa.id_kelas,siswa.foto,kelas.id_kelas,kelas.nm_kelas,kelas.tingkatan,kelas.id_jurusan,jurusan.id_jurusan,jurusan.nm_jurusan FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan where nisn='$id'");
    while($data = mysqli_fetch_array($sql)){
    ?> 
    <tr >
                         
      <td ><img src="images/<?=$data['foto']?>" width="150" height="150" style="display: block; margin: auto;"></td>  

    </tr>

<br>

    <table class="table table-striped table-bordered table-hover bg-danger " border=1 cellpadding=10 cellspacing=0
            align=center>

            <tr>
              <th class="table-primary" style="text-align: center;">NISN</th>
                                                                                                <td><?=$data['nisn']?></td>
            </tr>

            <tr> 
        <th class="table-primary" style="text-align: center;">Nama</th>
                                                                                                <td><?=$data['nama']?></td>
            </tr>
      
       <tr> 
        <th class="table-primary" style="text-align: center;">Kelas</th>
                                                                                                <td><?=$data['tingkatan']?>-<?=$data['nm_kelas']?></td>
            </tr>
            <tr>
                 <th class="table-primary" style="text-align: center;">Jurusan</th>
                     
                                                                                            <td><?=$data['nm_jurusan']?></td>
            </tr>      <!--  <th>ID Siswa</th>  -->
                    
           <tr>
               <th class="table-primary" style="text-align: center;">jenis Kelamin</th>
                                                                                                 <td><?=$data['gender']?></td>
           </tr>
            <tr>
                         
                   <th class="table-primary" style="text-align: center;">Tanggal lahir</th> 
                       
                                                                                        <td><?=$data['tgl_lahir']?></td>  
            </tr>
 <tr>
                <th class="table-primary" style="text-align: center;">Agama</th>
                                                                                             <td><?=$data['agama']?></td>
 </tr>
    <tr>
            <th class="table-primary" style="text-align: center;">Alamat</th>
                           
                                                                                            <td><?=$data['alamat']?></td> 
  </tr>
      
    
    </tr>


    <?php 
    }
    ?>

  </table>
<br>
  <!-- Footer -->
</body>
</html>

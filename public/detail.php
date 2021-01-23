<?php

// memulai session
session_start();

// cek session
if( !isset($_SESSION['login']) ) {
     header("Location: ../index.php");
     exit;
}

// koneksi ke file fungsi.php
require 'control/fungsi.php';

// menampilkan data sesuai id
$id = $_GET["id"];

// mengambil data dari database
$siswa = tampil("SELECT * FROM siswa WHERE id='$id'");

?>



<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Detail - Siswa/i</title>
     <!-- link icon -->
     <link rel="icon" type="image/gif" href="../img/man_logo.png" />

     <!-- link css -->
     <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
     <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
     <link rel="stylesheet" href="../scss/main.css">
</head>

<body>

     <!-- awal navbar -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <img src="../img/man_logo.png" width="40px" class="mr-2 mb-1">
     <a href="admin.php"><h4 class="navbar-brand mr-5 my-2 my-lg-0 text-warning justify-content-start">MAN 1 SUMENEP</h4></a>

          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
               <!-- kelas X -->
               <ul class="navbar-nav mr-3">
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              KELAS X
                         </a>
                         <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="kelas/x_agama.php">AGAMA</a>
                              <a class="dropdown-item" href="kelas/x_bahasa.php">BAHASA</a>
                              <a class="dropdown-item" href="kelas/x_ipa.php">IPA</a>
                              <a class="dropdown-item" href="kelas/x_ips.php">IPS</a>
                         </div>
                    </li>
               </ul>

               <!-- kelas XI -->
               <ul class="navbar-nav mr-3">
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              KELAS XI
                         </a>
                         <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="kelas/xi_agama.php">AGAMA</a>
                              <a class="dropdown-item" href="kelas/xi_bahasa.php">BAHASA</a>
                              <a class="dropdown-item" href="kelas/xi_ipa.php">IPA</a>
                              <a class="dropdown-item" href="kelas/xi_ips.php">IPS</a>
                         </div>
                    </li>
               </ul>

               <!-- kelas XII -->
               <ul class="navbar-nav mr-3">
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              KELAS XII
                         </a>
                         <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="kelas/xii_agama.php">AGAMA</a>
                              <a class="dropdown-item" href="kelas/xii_bahasa.php">BAHASA</a>
                              <a class="dropdown-item" href="kelas/xii_ipa.php">IPA</a>
                              <a class="dropdown-item" href="kelas/xii_ips.php">IPS</a>
                         </div>
                    </li>
               </ul>
          </div>
     </nav>
     <!-- akhir navbar -->

     <div class="container-fluid">
          <!-- awal card profil -->
          <div class="kartu card">
               <div class="card-header bg-dark text-warning text-center mt-3">
                    Informasi Detail Siswa/i <b>MAN 1 SUMENEP</b>
               </div>

               <?php
               // memulai pengulangan data sesuai database
               foreach( $siswa as $data ) :
               ?>

               <div class="kartu-bodi card-body text-center">
                    <!-- gambar -->
                    <img src="img/<?= $data["gambar"] ?>" class="rounded-circle">
                    <hr>
                    <!-- no induk -->
                    <h5 class="card-title">NO. INDUK</h5>
                    <p class="card-text"><?= $data["noinduk"] ?></p>
                    <hr>
                    <!-- nama -->
                    <h5 class="card-title">NAMA</h5>
                    <p class="card-text"><?= $data["nama"] ?></p>
                    <hr>
                    <!-- jenis kelamin -->
                    <h5 class="card-title">Jenis Kelamin</h5>
                    <p class="card-text"><?= $data["jeniskelamin"] ?></p>
                    <hr>
                    <!-- tempat lahir -->
                    <h5 class="card-title">NISN</h5>
                    <p class="card-text"><?= $data["nisn"] ?></p>
                    <hr>
                    <!-- nik -->
                    <h5 class="card-title">NIK</h5>
                    <p class="card-text"><?= $data["nik"] ?></p>
                    <hr>
                    <!-- tanggal lahir -->
                    <h5 class="card-title">Tempat Lahir</h5>
                    <p class="card-text"><?= $data["tempatlahir"] ?></p>
                    <hr>
                    <!-- nisn -->
                    <h5 class="card-title">Tanggal Lahir</h5>
                    <p class="card-text"><?= $data["tanggallahir"] ?></p>
                    <hr>
                    <!-- kelas -->
                    <h5 class="card-title">Kelas</h5>
                    <p class="card-text"><?= $data["kelas"] ?></p>
                    <hr>
                    <!-- program -->
                    <h5 class="card-title">Program</h5>
                    <p class="card-text"><?= $data["program"] ?></p>
                    <hr>
                    <!-- nama ayah-->
                    <h5 class="card-title">Nama Bapak</h5>
                    <p class="card-text"><?= $data["namabapak"] ?></p>
                    <hr>
                    <!-- nama ibu -->
                    <h5 class="card-title">Nama Ibu</h5>
                    <p class="card-text"><?= $data["namaibu"] ?></p>
                    <hr>
                    <!-- alamat -->
                    <h5 class="card-title">Alamat</h5>
                    <p class="card-text"><?= $data["alamat"] ?></p>
               </div>

               <?php
               // akhir pengulangan
               endforeach; 
               ?>

          </div>
          <!-- awal card profil -->
     </div>

     <!-- awal footer -->
     <div class=" footer bg-dark text-center text-warning">
          <h6>Aplikasi Sistem Informasi Sekolah v. 1,0</h6>
          <p>Copyright &copy MAN 1 SUMENEP 2020</p>
     </div>
     <!-- akhir footer -->


     <!-- link java script -->
     <script src="../asset/js/jquery-3.4.1.slim.min.js"></script>
     <script src="../asset/js/bootstrap.min.js"></script>
</body>

</html>
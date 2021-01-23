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

// mengambil data dari database
$siswa = tampil("SELECT * FROM siswa ORDER BY id DESC");
$user = tampil("SELECT * FROM user");

// cek apakah tombol pencarian di tekan
if( isset($_POST["cari"]) ) {

     // menampilkan data hasil pencarian
     $siswa = cari($_POST["keyword"] );
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home - Admin</title>
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
          <a href="admin.php"><h4 class="navbar-brand mr-5 my-2 my-lg-0 text-warning">MAN 1 SUMENEP</h4></a>

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
               <form action="" method="post" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Masukkan Nama/No. Induk..." name="keyword" aria-label="Search" autofocus autocomplete="off">
                    <button class="btn btn-outline-warning my-2 my-sm-0" type="submit" name="cari"><i
                              class="fas fa-search"></i></button>
               </form>
          </div>
     </nav>
     <!-- akhir navbar -->

     <?php               
          // memulai pengulangan data sesuai database
          foreach( $user as $row ) :              
     ?>

     <!-- awal profil admin -->
     <div class="card mt-3">
          <div class="card-header bg-dark text-warning">
               Selamat Datang, <b><?= $row["nama"] ?></b>
          </div>
          <div class="card-body text-center bg-warning">
               <img src="../img/admin/<?= $row["gambar"] ?>" class="rounded-circle mb-3">
               <h5 class="card-title"><?= $row["nama"] ?></h5>
               <p class="card-text"><?= $row["level"] ?></p>
               <a href="../logout.php" class="tombol btn btn-dark"><i class="fas fa-sign-out-alt mr-2"></i>Logout </a>
          </div>
     </div>
     <!-- akhir profil admin -->

     <?php 
          // akhir pengulangan
          endforeach;
     ?>

     <div class="container-fluid">

          <!-- awal tombol tambah data -->
          <div class="tambah text-center">
               <a href="tambah.php" class="tombol btn btn-warning mt-3"><i class="fas fa-plus-square mr-2"></i><b>Tambah
                    Data
                    Siswa/i</b></a>
          </div>
          <!-- awal tombol tambah data -->

          <!-- awal judul data -->
          <div class="alert alert-dark text-center mt-3 bg-dark text-warning" role="alert">
               DATA PESERTA DIDIK MADRASAH ALIYAH NEGERI 1 SUMENEP
          </div>
          <!-- akhir judul data -->

          <!-- awal tabel data -->
          <table class="table mt-2">
               <thead class="thead-dark">
                    <tr>
                         <th class="text-warning">NO</th>
                         <th class="text-warning">No. Induk</th>
                         <th class="text-warning">Nama</th>
                         <th class="text-warning">Jenis Kelamin</th>
                         <th class="text-warning">Tempat Lahir</th>
                         <th class="text-warning">Tanggal Lahir</th>
                         <th class="text-warning">Kelas</th>
                         <th class="text-warning">Program</th>
                         <th class="text-warning text-center">KET</th>
                    </tr>
               </thead>

               <?php 
               // membuat nomer urut
               $i = 1; 
               ?>

               <?php               
               // memulai pengulangan data sesuai database
               foreach( $siswa as $data ) :              
               ?>
               <tbody>
                    <tr>
                         <td><?= $i ?></td>
                         <td><?= $data["noinduk"] ?></td>
                         <td><?= $data["nama"] ?></td>
                         <td><?= $data["jeniskelamin"] ?></td>
                         <td><?= $data["tempatlahir"] ?></td>
                         <td><?= $data["tanggallahir"] ?></td>
                         <td><?= $data["kelas"] ?></td>
                         <td><?= $data["program"] ?></td>
                         <td class="text-center">
                              <a href="detail.php?id=<?= $data["id"]; ?>" class="btn btn-primary"><i
                                        class="fas fa-info-circle mr-2"></i>Info</a>
                              <a href="ubah.php?id=<?= $data["id"]; ?>" class="btn btn-warning"><i class="fas fa-pen-square mr-2"></i>Edit</a>
                              <a href="control/hapus.php?id=<?= $data["id"]; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda ingin menghapus <?= $data["nama"]; ?> ? ')" ><i class="fas fa-trash mr-2"></i>Hapus</a>
                         </td>
                    </tr>
               </tbody>
               <?php 
               // menambah nomer urut
               $i++; 
               ?>

               <?php 
               // akhir pengulangan
               endforeach;
               ?>
          </table>
          <!-- akhir tabel data -->
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
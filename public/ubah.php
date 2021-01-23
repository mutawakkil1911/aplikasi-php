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
$siswa = tampil("SELECT * FROM siswa WHERE id='$id'") [0] ;

// cek apakah tombol submit di tekan
if( isset($_POST["submit"]) ) {

     // cek apakah data berhasil di ubah atau tidak
     if( ubah($_POST) > 0 ) {
          echo "<script>
               alert('Data berhasil diubah !');
               document.location.href = 'admin.php';
               </script>
          ";
     } else {
          echo "<script>
               alert('Data gagal diubah !');
               document.location.href = 'admin.php';
               </script>
          ";
     }
     
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Edit - Siswa/i</title>
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
          <div class="card">
               <div class="card-header bg-dark text-warning text-center mt-3">
                    Edit Data Siswa/i <b>MAN 1 SUMENEP</b>
               </div>
               <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                         <input type="hidden" name="id" value="<?= $siswa["id"]; ?>">
                         <input type="hidden" name="gambarLama" value="<?= $siswa["gambar"]; ?>">

                         <div class="form-group">
                              <label for="noinduk">No. Induk</label>
                              <input type="text" class="form-control" name="noinduk" id="noinduk"
                                   placeholder="Masukkan Nomer Induk" required autocomplete="off" autofocus value="<?= $siswa["noinduk"]; ?>">
                         </div>
                         <div class="form-group">
                              <label for="nama">NAMA</label>
                              <input type="text" class="form-control" name="nama" id="nama"
                                   placeholder="Masukkan Nama Lengkap" required autocomplete="off" value="<?= $siswa["nama"]; ?>">
                         </div>
                         <div class="form-group">
                              <label for="jeniskelamin">Jenis Kelamin</label>
                              <select class="form-control" name="jeniskelamin" id="jeniskelamin"
                                   required autocomplete="off">
                                   <option><?= $siswa["jeniskelamin"]; ?></option>
                                   <option> -- Pilih Jenis Kelamin -- </option>
                                   <option>Laki-Laki</option>
                                   <option>Perempuan</option>
                              </select>
                         </div>
                         <div class="form-group">
                              <label for="nisn">NISN</label>
                              <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Masukkan NISN"
                                   required autocomplete="off" value="<?= $siswa["nisn"]; ?>">
                         </div>
                         <div class="form-group">
                              <label for="nik">NIK</label>
                              <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK"
                                   required autocomplete="off" value="<?= $siswa["nik"]; ?>">
                         </div>
                         <div class="form-group">
                              <label for="tempatlahir">Tempat Lahir</label>
                              <input type="text" class="form-control" name="tempatlahir" id="tempatlahir"
                                   placeholder="Masukkan Tempat Lahir" required autocomplete="off"  value="<?= $siswa["tempatlahir"]; ?>">
                         </div>
                         <div class="form-group">
                              <label for="tanggallahir">Tanggal Lahir</label>
                              <input type="date" class="form-control" name="tanggallahir" id="tanggallahir"
                                   required autocomplete="off" value="<?= $siswa["tanggallahir"]; ?>">
                         </div>
                         <div class="form-group">
                              <label for="kelas">Kelas</label>
                              <select class="form-control" name="kelas" id="kelas" required autocomplete="off">
                                   <option><?= $siswa["kelas"]; ?></option>
                                   <option> -- Pilih Kelas -- </option>
                                   <option>X</option>
                                   <option>XI</option>
                                   <option>XII</option>
                              </select>
                         </div>
                         <div class="form-group">
                              <label for="program">Program</label>
                              <select class="form-control" name="program" id="program" required autocomplete="off">
                                   <option><?= $siswa["program"]; ?></option>
                                   <option> -- Pilih Program -- </option>
                                   <option>Agama</option>
                                   <option>Bahasa</option>
                                   <option>IPA</option>
                                   <option>IPS</option>
                              </select>
                         </div>
                         <div class="form-group">
                              <label for="namabapak">Nama Bapak</label>
                              <input type="text" class="form-control" name="namabapak" id="namabapak"
                                   placeholder="Masukkan Nama Bapak" required autocomplete="off" value="<?= $siswa["namabapak"]; ?>">
                         </div>
                         <div class="form-group">
                              <label for="namaibu">Nama Ibu</label>
                              <input type="text" class="form-control" name="namaibu" id="namaibu"
                                   placeholder="Masukkan Nama Ibu " required autocomplete="off" value="<?= $siswa["namaibu"]; ?>">
                         </div>
                         <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <input type="text" class="form-control" name="alamat" id="alamat"
                                   placeholder="Masukkan Alamat " required autocomplete="off" value="<?= $siswa["alamat"]; ?>">
                         </div>
                         <div class="form-group">
                              <label for="gambar">Gambar</label>
                              <br>
                              <img src="img/<?= $siswa["gambar"]; ?>" class="rounded-circle" width="100">
                              <hr>
                              <input type="file" class="form-control-file" name="gambar" id="gambar" autocomplete="off">
                         </div>
                         <div class="from-group">
                              <button type="submit" name="submit" class="tombol-save btn btn-success"><i
                                        class="fas fa-save mr-2"></i>SIMPAN</button>
                         </div>
                    </form>
               </div>
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
<?php

// memulai session
session_start();

// cek session
if( isset($_SESSION['login']) ) {
     header("Location: public/admin.php");
     exit;
}

// koneksi ke file fungsi.php
require 'public/control/fungsi.php';

// cek apakah tombol login ditekan
if( isset($_POST['login'] ) ) {
    $login = login($_POST);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login - MAN 1 SUMENEP</title>
     <!-- link icon -->
     <link rel="icon" type="image/gif" href="img/man_logo.png" />

     <!-- link css -->
     <link rel="stylesheet" href="asset/css/bootstrap.min.css">
     <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
     <link rel="stylesheet" href="scss/main.css">
</head>

<body>

     <!-- awal container utama -->
     <div class="login container mb-5">
          <div class="row">
               <div class="col-6 mx-auto mt-5">
               <div class="card">
                    <p class="card-header text-center bg-dark text-white">Silahkan login aplikasi <b>Sistem Informasi Sekolah</b></p>
                    <div class="card-body bg-light">
                         <div class="text-center">
                              <img src="img/man_logo.png" width="150px">
                              <h3 class="mt-3">Madrasah Aliyah Negeri 1</h3>
                              <h6>SUMENEP</h6>
                              <hr>
                         </div>

                         <?php
                              // pesan error
                              if( isset($login['error'])) :
                              ?>

                              <div class="alert alert-danger" role="alert">
                                   Username dan Password Salah !
                              </div>
                              <?php
                              // akhir pesan error
                              endif;
                              ?>
                              

                              <form action="" method="post" class="frommasuk">
                                   <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" autocomplete="off"
                                             required autofocus>
                                   </div>
                                   <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                             autocomplete="off" required>
                                   </div>
                                   <button type="submit" name="login" class="tombol btn btn-warning">Login</button>
                              </form>

                              <div class="info alert alert-success mt-5" role="alert">
                                   Hubungi <a href="mailto:mutawakkil.app@gmail.com" class="alert-link">mutawakkil.app@gmail.com</a>. untuk mencoba demo aplikasi.
                              </div>
                              </div>
                              </div>

               </div>
          </div>
     </div>
     <!-- akhir container utama -->


     <!-- awal footer -->
     <div class=" footer bg-dark text-center text-warning">
          <h6>Aplikasi Sistem Informasi Sekolah v. 1,0</h6>
          <p>Copyright &copy MAN 1 SUMENEP 2020</p>
     </div>
     <!-- akhir footer -->


     <!-- link java script -->
     <script src="asset/js/jquery-3.4.1.slim.min.js"></script>
     <script src="asset/js/bootstrap.min.js"></script>
</body>

</html>
<?php

// koneksi ke file fungsi.php
require 'fungsi.php';

// ambil id dari url
$id = $_GET["id"];

// cek apakah data berhasil dihapus atau tidak
if ( hapus($id) > 0 ) {
      echo "<script>
               alert('Data berhasil dihapus !');
               document.location.href = '../admin.php';
               </script>
          ";
     } else {
          echo "<script>
               alert('Data gagal dihapus !');
               document.location.href = '../admin.php';
               </script>
          ";
}

?>
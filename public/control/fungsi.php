<?php 
// koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "aplikasi-siswa");



// membuat fungsi tampil (query)
function tampil($query) {

	// mengambil koneksi database di atas
     global $koneksi;
     $result = mysqli_query($koneksi, $query);
	$database = [];
	
	// pengulangan
     while( $data = mysqli_fetch_assoc($result) ) {
          $database[] = $data;
     }
     return $database;
}



// membuat fungsi tambah (insert)
function tambah($data) {

	// mengambil koneksi database di atas
     global $koneksi;

	// ambil data dari setiap form (urutan sesuai tabel di form pengisian)
     
     $noinduk = htmlspecialchars($data["noinduk"]);
     $nama = htmlspecialchars($data["nama"]);
     $jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
     $nisn = htmlspecialchars($data["nisn"]);
     $nik = htmlspecialchars($data["nik"]);
     $tempatlahir = htmlspecialchars($data["tempatlahir"]);
     $tanggallahir = htmlspecialchars($data["tanggallahir"]);
     $kelas = htmlspecialchars($data["kelas"]);
     $program = htmlspecialchars($data["program"]);
     $namabapak = htmlspecialchars($data["namabapak"]);
     $namaibu = htmlspecialchars($data["namaibu"]);
	$alamat = htmlspecialchars($data["alamat"]);
	

	// membuat fungsi upload gambar
	$gambar = upload();
	if( !$gambar) {

		// membatalkan upload jika gambar tidak berhasil di upload
		return false;
	}
	
	// masukkan ke database (urutan sesuai tabel di database)
	$query = "INSERT INTO siswa
		VALUES
	('', '$noinduk', '$nama', '$jeniskelamin', '$nisn', '$nik', '$tempatlahir', '$tanggallahir', '$kelas', '$program', '$namabapak', '$namaibu', '$alamat', '$gambar')
	";

	mysqli_query($koneksi, $query);

	// mengembalikan angka untuk pengecekan keberhasilan
	return mysqli_affected_rows($koneksi);
}



function upload() {

	// ambil data yang dibutuhkan oleh gambar
	$namaFile = $_FILES['gambar']['name'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek keberhasilan upload gambar
	if( $error === 4 ) {

		echo "<script>
				alert('Silahkan pilih gambar terlebih dahulu !');
			</script>";

		// membatalkan upload jika gambar tidak berhasil di upload
		return false;
	}

	// cek ekstensi gambar yang di upload
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {

		echo "<script>
				alert('Pastikan tipe gambar adalah jpg/png !');
			</script>";

		// membatalkan upload jika gambar tidak berhasil di upload
		return false;
	}

	// buat nama baru acak buat gambar
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	// setelah memenuhi syarat diatas upload gambar ke direktori
	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	// mengembalikan namafile yang di upload untuk ditampilkan di fungsi tampil
	return $namaFileBaru;
}



// membuat fungsi hapus (delete)
function hapus($id) {

	// mengambil koneksi database di atas
	global $koneksi;
	
	// menghapus data sesuai id
	mysqli_query($koneksi, "DELETE FROM siswa WHERE id=$id");

	// mengembalikan angka untuk pengecekan keberhasilan
	return mysqli_affected_rows($koneksi);
}



// membuat fungsi ubah (update)
function ubah($data) {

	// mengambil koneksi database di atas
	global $koneksi;

	// ambil data dari setiap form (urutan sesuai tabel di form pengisian)

	$id = $data["id"];
	$noinduk = htmlspecialchars($data["noinduk"]);
	$nama = htmlspecialchars($data["nama"]);
	$jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
	$nisn = htmlspecialchars($data["nisn"]);
	$nik = htmlspecialchars($data["nik"]);
	$tempatlahir = htmlspecialchars($data["tempatlahir"]);
	$tanggallahir = htmlspecialchars($data["tanggallahir"]);
	$kelas = htmlspecialchars($data["kelas"]);
	$program = htmlspecialchars($data["program"]);
	$namabapak = htmlspecialchars($data["namabapak"]);
	$namaibu = htmlspecialchars($data["namaibu"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	// cek apakah user mengubah gambar
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}
	
	// masukkan ke database (urutan sesuai urutan di atas)
	$query = "UPDATE siswa SET

				noinduk = '$noinduk',
				nama = '$nama',
				jeniskelamin = '$jeniskelamin',
				nisn = '$nisn',
				nik = '$nik',
				tempatlahir = '$tempatlahir',
				tanggallahir = '$tanggallahir',
				kelas = '$kelas',
				program = '$program',
				namabapak = '$namabapak',
				namaibu = '$namaibu',
				alamat = '$alamat',
				gambar = '$gambar'
			WHERE id = $id
			";

	mysqli_query($koneksi, $query);

	// mengembalikan angka untuk pengecekan keberhasilan
	return mysqli_affected_rows($koneksi);
}



// membuat fungsi cari (search)
function cari($keyword){

	// menampilkan data mahasiswa sesuai pencarian
	$query = "SELECT * FROM siswa 
				WHERE
			noinduk LIKE '%$keyword%' OR
			nama LIKE '%$keyword%' OR
			nisn LIKE '%$keyword%' OR
			nik LIKE '%$keyword%'
			
		";
	
	// mengambil data untuk di tampilkan dari fungsi tampil di atas
	return tampil($query);
}

// membuat fungsi login
function login($data) {

	// mengambil koneksi database di atas
	global $koneksi;

	// mengambil data yang diinpu user
	$username = htmlspecialchars($data['username']);
	$password = htmlspecialchars($data['password']);

	// proses login
	if( $datauser = tampil("SELECT * FROM user WHERE username = '$username' && password = '$password'")) {

		// mengatur session
		$_SESSION['login']= true;

		// jika berhasil arahkan ke halaman admin
		header("Location: public/admin.php");
		exit;
		
	} 
	// jika gagal sampaikan pesan error
	else{
		return [
			'error' => true,
		];
	}
}

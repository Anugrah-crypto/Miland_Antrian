<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'database.php';


// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($mysqli,"select * from user where username='$username' and password='$password'");
if (!$login) {
    die("Query failed: " . mysqli_error($mysqli)); // Check for query execution error
}
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:Admin/index.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['level']=="guest"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "guest";
		// alihkan ke halaman dashboard pegawai
		header("location:Pengunjung/index.php");

 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
 
?>
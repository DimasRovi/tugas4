<?php
// mdngaktifkan session pada php
session_start();

//menghubungkan php dengan koneksi database
include 'connection.php';

//menangkap data yang di kirim dari form lgin
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($connect,"select * from login where username='$username' and password='$password'");
//menghitung jumlah data yang di temukan
$cek = mysqli_num_rows($login);

//cek apakah username dan passowrd di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	//cek jika user login sebgai admin
	if($data['level']== "admin"){
// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/data_mahasiswa.php");
	// cek jika user login sebagai pegawai
	}else if($data['level']=="petugas"){
	// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "petugas";
		//alihkan 
		header("location:petugas/data_mahasiswa.php");

	}else{
		$_SESSION['gagal'] = "Masukk";
		header("location:index.php?pesan=gagal");

	}
}else{
		header("location:index.php?pesan=gagal");
}
?>
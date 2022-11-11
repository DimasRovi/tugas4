<?php
	include "../connection.php";

	$id = $_POST['id_dosen'];
	$nama_dosen = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];

	$update = mysqli_query($connect,"UPDATE t_dosen set nama_dosen='$nama_dosen', alamat='$alamat', telepon='$telepon' where id_dosen='$id'") or die (mysqli_error($connect));
	if ($update) {
		echo "<script>alert('Data berhasil diedit');location.href='data_dosen.php';</script>";
	}else{
		echo "<script>alert('Data gagal diedit');location.href='data_dosen.php';</script>";
	}
?>
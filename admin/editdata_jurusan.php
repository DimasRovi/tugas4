<?php
	include "../connection.php";

	$id = $_POST['id_jurusan'];
	$nama_jurusan = $_POST['nama'];

	$update = mysqli_query($connect,"UPDATE jurusan set nama_jurusan='$nama_jurusan' where id_jurusan='$id'") or die (mysqli_error($connect));
	if ($update) {
		echo "<script>alert('Data berhasil diedit');location.href='data_jurusan.php';</script>";
	}else{
		echo "<script>alert('Data gagal diedit');location.href='data_jurusan.php';</script>";
	}
?>
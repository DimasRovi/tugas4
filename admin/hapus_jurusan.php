<?php
	$id = $_GET['id_jurusan'];

	include "../connection.php";
	$delete = mysqli_query($connect,"DELETE FROM jurusan Where id_jurusan = $id") or die (mysqli_error($connect));
	if ($delete) {
		echo "<script>alert('Data berhasil dihapus');location.href='data_jurusan.php';</script>";
	}else{
		echo "<script>alert('Data gagal dihapus');location.href='data_jurusan.php';</script>";
	}
?>
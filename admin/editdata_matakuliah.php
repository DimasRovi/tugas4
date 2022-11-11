<?php
	include "../connection.php";

	$id = $_POST['id_matkul'];
	$matakuliah = $_POST['matakuliah'];
	$update = mysqli_query($connect,"UPDATE t_matkul set matakuliah ='$matakuliah' where id_matkul ='$id'") or die (mysqli_error($connect));
	if ($update) {
		echo "<script>alert('Data berhasil diedit');location.href='data_matakuliah.php';</script>";
	}else{
		echo "<script>alert('Data gagal diedit');location.href='data_matakuliah.php';</script>";
	}
?>
<?php
	$id = $_GET['id_matkul'];

	include "../connection.php";
	$delete = mysqli_query($connect,"DELETE FROM t_matkul Where id_matkul = $id") or die (mysqli_error($connect));
	if ($delete) {
		echo "<script>alert('Data berhasil dihapus');location.href='data_matakuliah.php';</script>";
	}else{
		echo "<script>alert('Data gagal dihapus');location.href='data_matakuliah.php';</script>";
	}
?>
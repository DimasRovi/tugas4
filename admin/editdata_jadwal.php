<?php
	include "../connection.php";

	$id = $_POST['id_jadwal'];
	$hari = $_POST['hari'];
	$jam = $_POST['jam'];
	$dos = $_POST['dosen'];
	$mat = $_POST['matkul'];

	$update = mysqli_query($connect,"UPDATE t_jadwal set hari='$hari', jam='$jam', id_matkul='$mat', id_dosen='$dos' where id_matkul='$id'") or die (mysqli_error($connect));
	if ($update) {
		echo "<script>alert('Data berhasil diedit');location.href='data_jadwal.php';</script>";
	}else{
		echo "<script>alert('Data gagal diedit');location.href='data_jadwal.php';</script>";
	}
?>
<?php
	if($_POST){
		$nama_jurusan = $_POST['jurusan'];

		if (empty($nama_jurusan)) {
			echo "<script>alert('Nama jurusan tidak boleh kosong');location.href='tambah_jurusan.php';</script>";
		}else{
			include "../connection.php";
			$insert = mysqli_query($connect,"iNSERT INTO jurusan (nama_jurusan)
				value ('".$nama_jurusan."')") or die (mysqli_error($connect));
			if ($insert) {
				echo "<script>alert('Data berhasil ditambahkan');location.href='data_jurusan.php';</script>";
			}else{
				echo "<script>alert('Data gagal ditambahkan');location.href='tambah_jurusan.php';</script>";
			}
		}
	}
?>
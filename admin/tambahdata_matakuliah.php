<?php
	if($_POST){
		$nama_matakuliah = $_POST['nama'];

		if (empty($nama_matakuliah)) {
			echo "<script>alert('Nama matakuliah tidak boleh kosong');location.href='tambah_matakuliah.php';</script>";
		}else{
			include "../connection.php";
			$insert = mysqli_query($connect,"iNSERT INTO t_matkul (matakuliah)
				value ('".$nama_matakuliah."')") or die (mysqli_error($connect));
			if ($insert) {
				echo "<script>alert('Data berhasil ditambahkan');location.href='data_matakuliah.php';</script>";
			}else{
				echo "<script>alert('Data gagal ditambahkan');location.href='tambah_matakuliah.php';</script>";
			}
		}
	}
?>
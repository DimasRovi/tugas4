<?php
	if($_POST){
		$nama_dosen = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telepon = $_POST['telepon'];

		if (empty($nama_dosen)) {
			echo "<script>alert('Nama Dosen tidak boleh kosong');location.href='tambah_dosen.php';</script>";
		}elseif (empty($alamat)) {
			echo "<script>alert('Alamat tidak boleh kosong');location.href='tambah_dosen.php';</script>";
		}elseif (empty($telepon)) {
			echo "<script>alert('Nomor Telepon tidak boleh kosong');location.href='tambah_dosen.php';</script>";
			}else{
			include "../connection.php";
			$insert = mysqli_query($connect,"iNSERT INTO t_dosen (nama_dosen, alamat, telepon)
				value ('".$nama_dosen."','".$alamat."','".$telepon."')") or die (mysqli_error($connect));
			if ($insert) {
				echo "<script>alert('Data berhasil ditambahkan');location.href='data_dosen.php';</script>";
			}else{
				echo "<script>alert('Data gagal ditambahkan');location.href='tambah_dosen.php';</script>";
			}
		}
	}
?>
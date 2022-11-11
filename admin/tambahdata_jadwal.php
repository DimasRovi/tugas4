<?php
	if($_POST){
		$hari = $_POST['hari'];
		$jam = $_POST['jam'];
		$matakuliah = $_POST['matkul'];
		$nama_dosen = $_POST['dosen'];


		if (empty($hari)) {
			echo "<script>alert('Hari tidak boleh kosong');location.href='tambah_jadwal.php';</script>";
		}elseif (empty($jam)) {
			echo "<script>alert('Jam tidak boleh kosong');location.href='tambah_jadwal.php';</script>";
		}elseif (empty($matakuliah)) {
			echo "<script>alert('Mata Kuliah tidak boleh kosong');location.href='tambah_jadwal.php';</script>";
		}elseif (empty($nama_dosen)) {
			echo "<script>alert('Nama Dosen tidak boleh kosong');location.href='tambah_jadwal.php';</script>";
		}else{
			include "../connection.php";
			$insert = mysqli_query($connect,"iNSERT INTO t_jadwal (hari, jam, id_matkul, id_dosen)
				value ('".$hari."','".$jam."','".$matakuliah."','".$nama_dosen."')") or die (mysqli_error($connect));
			if ($insert) {
				echo "<script>alert('Data berhasil ditambahkan');location.href='data_jadwal.php';</script>";
			}else{
				echo "<script>alert('Data gagal ditambahkan');location.href='tambah_jadwal.php';</script>";
			}
		}
	}
?>
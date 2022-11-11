<?php 
session_start();
include "../navbar.php";


			if ($_SESSION['level']== "") {
					$_SESSION['gagal-login'] = "Logi dulu tod !!!";
					header("location:../index.php");
			}
			

			
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome.min.css">
</head>
<body style="width: 1300px; margin: auto; margin-top: 10px">
	<a style="margin-bottom: 10px" href="tambah_dosen.php" type="button" class="btn btn-success">Tambah Data</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Dosen</th>
      <th scope="col">Alamat</th>
      <th scope="col">telepon</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    	include "../connection.php";
    	$query = mysqli_query($connect,"SELECT * FROM t_dosen");
    	$no = 0;
    	while ($data = mysqli_fetch_array($query)){
    		$no++;?>
    		<tr>
		      <th><?=$no?></th>
		      <td><?=$data['nama_dosen']?></td>
		      <td><?=$data['alamat']?></td>
		      <td><?=$data['telepon']?></td>
		      <td style="color: #fff">
		      	<a href='edit_dosen.php?id_dosen=<?=$data['id_dosen']?>' type="button" class="btn btn-warning">Edit</a>
		      	<a href="hapus_dosen.php?id_dosen=<?=$data['id_dosen']?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')" type="button" class="btn btn-danger">Hapus</a>
		      </td>
		    </tr>
    	<?php } ?>
  </tbody>
</table>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</html>
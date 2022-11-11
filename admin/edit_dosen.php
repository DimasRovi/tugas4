<?php 
session_start();



			if ($_SESSION['level']== "") {
					$_SESSION['gagal-login'] = "Logi dulu tod !!!";
					header("../location:index.php");
			}
			

			
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Dosen</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome.min.css">
</head>
<body style="width: 500px; margin: auto; margin-top: 10px">
<?php
	$id = $_GET['id_dosen'];

	include "../connection.php";
	$ambil = mysqli_query($connect,"SELECT * FROM t_dosen Where id_dosen = $id") or die (mysqli_error($connect));
	$fti = mysqli_query($connect, "select * from id_dosen");
	while($data = mysqli_fetch_array($ambil)){
		?>
		<h4 style="text-align:center;">Edit Data</h4>
		<form action="editdata_dosen.php" method="POST">
			<input type="hidden" name="id_dosen" id="id_dosen" value="<?php echo $data['id_dosen'] ?>">
			<div class="form-group">
			  <label>Nama Dosen</label>
			  <input type="text" class="form-control" name="nama" id="nama_dosen" value="<?php echo $data['nama_dosen'] ?>">
			</div>
			<div class="form-group">
			  <label>Alamat</label>
			  <textarea class="form-control" name="alamat" id="alamat"><?php echo $data['alamat'] ?></textarea>
			</div>
			<div class="form-group">
     		 <label>telepon</label>
     		 <input type="text" class="form-control" name="telepon" id="telepon" value="<?php echo $data['telepon'] ?>">
    		</div>
			<button style="float: right;" type="submit" class="btn btn-success">Simpan</button>
			<a style="float: right; margin-right: 10px" href="data_dosen.php" type="button" class="btn btn-danger">Batal</a>
		</form>
		<?php 
	}
?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</html>
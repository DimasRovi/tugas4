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
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome.min.css">
</head>
<body style="width: 500px; margin: auto; margin-top: 10px">
<?php
	$id = $_GET['id_jurusan'];

	include "../connection.php";
	$ambil = mysqli_query($connect,"SELECT * FROM jurusan Where id_jurusan = $id") or die (mysqli_error($connect));
	$fti = mysqli_query($connect, "select * from jurusan");
	while($data = mysqli_fetch_array($ambil)){
		?>
		<h4 style="text-align:center;">Edit Data</h4>
		<form action="editdata_jurusan.php" method="POST">
			<input type="hidden" name="id_jurusan" id="id_jurusan" value="<?php echo $data['id_jurusan'] ?>">
			<div class="form-group">
			  <label>Nama Jurusan</label>
			  <input type="text" class="form-control" name="nama" id="nama_jurusan" value="<?php echo $data['nama_jurusan'] ?>">
			</div>
			<button style="float: right;" type="submit" class="btn btn-success">Simpan</button>
			<a style="float: right; margin-right: 10px" href="data_jurusan.php" type="button" class="btn btn-danger">Batal</a>
		</form>
		<?php 
	}
?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</html>
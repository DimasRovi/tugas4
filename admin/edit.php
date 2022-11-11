<?php 
session_start();



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
<body style="width: 500px; margin: auto; margin-top: 10px">
<?php
	$id = $_GET['id_mahasiswa'];

	include "../connection.php";
	$ambil = mysqli_query($connect,"SELECT * FROM t_mahasiswa Where id_mahasiswa = $id") or die (mysqli_error($connect));
	$fti = mysqli_query($connect, "select * from jurusan");
	while($data = mysqli_fetch_array($ambil)){
		?>
		<h4 style="text-align:center;">Edit Data</h4>
		<form action="editdata.php" method="POST">
			<input type="hidden" name="id_mahasiswa" id="id_mahasiswa" value="<?php echo $data['id_mahasiswa'] ?>">
			<div class="form-group">
			  <label>Nama Mahasiswa</label>
			  <input type="text" class="form-control" name="nama" id="nama_mahasiswa" value="<?php echo $data['nama_mahasiswa'] ?>">
			</div>
			<div class="form-group">
			  <label>Nomor Induk Mahasiswa</label>
			  <input type="number" class="form-control" name="nim" id="nim" value="<?php echo $data['nim'] ?>">
			</div>
			<div class="form-group">
			  <label>Jurusan</label>
			  <select name="jurusan" class="form-control"><?php while ($data_jurusan = mysqli_fetch_array($fti)) { ?>
			<option value="<?= $data_jurusan['id_jurusan'] ?>">
			<?= $data_jurusan['nama_jurusan'] ?>
			</option>';
			<?php }?>
			</select>
			</div>
			<div class="form-group">
			  <label>Alamat</label>
			  <textarea class="form-control" name="alamat" id="alamat"><?php echo $data['alamat'] ?></textarea>
			</div>
			<div class="form-group">
     		 <label>Username</label>
     		 <input type="text" class="form-control" name="username" id="username" value="<?php echo $data['username'] ?>">
    		</div>
    		<div class="form-group">
     		 <label>Password</label>
      		<input type="text" class="form-control" name="password" id="password" value="<?php echo $data['password'] ?>">
   			 </div>
			<button style="float: right;" type="submit" class="btn btn-success">Simpan</button>
			<a style="float: right; margin-right: 10px" href="data_mahasiswa.php" type="button" class="btn btn-danger">Batal</a>
		</form>
		<?php 
	}
?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</html>
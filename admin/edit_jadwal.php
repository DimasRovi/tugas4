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
	$id = $_GET['id_jadwal'];

	include "../connection.php";
	$data = mysqli_query($connect,"SELECT * FROM t_jadwal Where id_jadwal = $id") or die (mysqli_error($connect));
	$mat = mysqli_query($connect, "select * from t_matkul");
	$dos = mysqli_query($connect, "select * from t_dosen");
	while($data = mysqli_fetch_array($data)){
		?>
		<form action="tambahdata_jadwal.php" method="POST">
			<?php
$mat = mysqli_query($connect, "select * from t_matkul");
$dos = mysqli_query($connect, "select * from t_dosen");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Data Mahasiswa</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/font-awesome.min.css">
</head>
<body style="width: 500px; margin: auto; margin-top: 10px">
  <form action="tambahdata_jadwal.php" method="POST">
    <div class="form-group">
      <label>HARI</label>
        <select class="form-control" name="hari" id="hari">
                               <?php $hari=$data['hari'];  ?>
	            <option value="">Pilih Hari</option>
	            <option value="SENIN"<?= $hari=='SENIN' ? 'selected' : null ?>>SENIN</option>
	            <option value="SELASA"<?= $hari=='SELASA' ? 'selected' : null ?>>SELASA</option>
	            <option value="RABU"<?= $hari=='RABU' ? 'selected' : null ?>>RABU</option>
	            <option value="KAMIS"<?= $hari=='KAMIS' ? 'selected' : null ?>>KAMIS</option>
	            <option value="JUMAT"<?= $hari=='JUMAT' ? 'selected' : null ?>>JUM'AT</option>
	            <option value="SABTU"<?= $hari=='SABTU' ? 'selected' : null ?>>SABTU</option>
	            <option value="MINGGU"<?= $hari=='MINGGU' ? 'selected' : null ?>>MINGGU</option>
                            </select>
    </div>
    <div class="form-group">
      <label>JAM</label>
      <input type="time" class="form-control" name="jam" id="jam">
    </div>
    
   <div class="form-group">
        <label>dosen</label>
        <select name="dosen" class="form-control">
	        	<option>--Pilih Dosen--</option>
	        	<?php
	        	while ($dos=mysqli_fetch_array($dos)){?>
	        		<option value="<?=$dos['id_dosen']?>"
	        		<?=$data['id_dosen'] == $dos['id_dosen'] ? 'selected' : null ?>
	        		><?=$dos['nama_dosen']?></option>
	        	<?php } ?>
	      </select>
      </div>
    <button style="float: right;" type="submit" class="btn btn-success">Simpan</button>
    <a style="float: right; margin-right: 10px" href="data_mahasiswa.php" type="button" class="btn btn-danger">Batal</a>
  </form>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</html>
	    <div class="form-group">
	        <label>matakuliah</label>
	        <select name="matkul" class="form-control">
	        	<option>--Pilih Matkul--</option>
	        	<?php
	        	while ($mat=mysqli_fetch_array($mat)){?>
	        		<option value="<?=$mat['id_matkul']?>"
	        		<?=$data['id_matkul']== $mat['id_matkul'] ? 'selected' : null ?>
	        		><?=$mat['matakuliah']?></option>
	        	<?php }?>
	      </select>
	    </div>
	    <button style="float: right;" type="submit" class="btn btn-success">Simpan</button>
	    <a style="float: right; margin-right: 10px" href="data_jadwal.php" type="button" class="btn btn-danger">Batal</a>
  </form>
		<?php 
	}
?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</html>

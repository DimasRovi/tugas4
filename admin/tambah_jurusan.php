<?php
include "../connection.php";
$fti = mysqli_query($connect, "select * from jurusan");
session_start();


      if ($_SESSION['level']== "") {
          $_SESSION['gagal-login'] = "Logi dulu tod !!!";
          header("location:../index.php");
      }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Jurusan</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome.min.css">
</head>
<body style="width: 500px; margin: auto; margin-top: 10px">
  <form action="tambahdata_jurusan.php" method="POST">
     <div class="form-group">
      <label>Nama Jurusan</label>
      <input type="text" class="form-control" name="jurusan" id="jurusan">
    </div>
    <button style="float: right;" type="submit" class="btn btn-success">Simpan</button>
    <a style="float: right; margin-right: 10px" href="data_jurusan.php" type="button" class="btn btn-danger">Batal</a>
  </form>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</html>
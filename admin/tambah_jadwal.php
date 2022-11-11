<?php
include "../connection.php";
$mat = mysqli_query($connect, "select * from t_matkul");
$dos = mysqli_query($connect, "select * from t_dosen");
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
  <form action="tambahdata_jadwal.php" method="POST">
    <div class="form-group">
      <label>HARI</label>
        <select class="form-control" name="hari" id="hari">
                                <option value="">Pilih Hari</option>
                                <option value="SENIN">Senin</option>
                                <option value="SELASA">Selasa</option>
                                <option value="RABU">Rabu</option>
                                <option value="KAMIS">Kamis</option>
                                <option value="JUM'AT">Jum'at</option>
                                <option value="SABTU">Jum'at</option>
                                <option value="MINGGU">Jum'at</option>
                            </select>
    </div>
    <div class="form-group">
      <label>JAM</label>
      <input type="time" class="form-control" name="jam" id="jam">
    </div>
    <div class="form-group">
        <label>matakuliah</label>
        <select name="matkul" class="form-control"><?php while ($data = mysqli_fetch_array($mat)) { ?>
      <option value="<?= $data['id_matkul'] ?>">
      <?= $data['matakuliah'] ?>
      </option>';
      <?php }?>
      </select>
      </div>
   <div class="form-group">
        <label>dosen</label>
        <select name="dosen" class="form-control"><?php while ($data = mysqli_fetch_array($dos)) { ?>
      <option value="<?= $data['id_dosen'] ?>">
      <?= $data['nama_dosen'] ?>
      </option>';
      <?php }?>
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
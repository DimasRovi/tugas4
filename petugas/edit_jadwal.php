<?php
include "../connection.php";
$qry_get_jadwal = mysqli_query($connect, "select * from t_jadwal where id_jadwal = '" . $_GET['id_jadwal'] . "'");

$data_jadwal = mysqli_fetch_array($qry_get_jadwal);

$mat = mysqli_query($connect, "select * from t_matkul");
$dos = mysqli_query($connect, "select * from t_dosen");
session_start();



if ($_SESSION['level'] == "") {
	$_SESSION['gagal-login'] = "Login dulu bos !!!";
	header("location:../index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome.min.css">
</head>
<style>
    .mx-auto {
        width: 800px;
    }

    .card {
        margin-bottom: 10px;
    }
</style>

<body>
    <div class="mx-auto">
        <div class="card ">
            <div class="card-header">
                <h3>Tambah Data Jadwal</h3>
            </div>
            <div class="card-body">
                <form action="editdata_jadwal.php" method="post">
                    <div class="mb-3 row">
                        <input type="hidden" name="id_jadwal" value="<?= $data_jadwal['id_jadwal'] ?>">
                        <label for="hari" class="col-sm-2 col-form-label">Hari </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="hari" id="hari">
                                <?php $hari = $data_jadwal['hari'] ?>
                                <option value="Senin" <?= $hari == 'Senin' ? 'selected' :null ?>>Senin</option>
                                <option value="Selasa" <?= $hari == 'Selasa' ? 'selected' :null ?>>Selasa</option>
                                <option value="Rabu"<?= $hari == 'Rabu' ? 'selected' :null ?>>Rabu</option>
                                <option value="Kamis"<?= $hari == 'Kamis' ? 'selected' :null ?>>Kamis</option>
                                <option value="Jumat"<?= $hari == 'Jumat' ? 'selected' :null ?>>Jumat</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jam" class="col-sm-2 col-form-label">Jam</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" id="jam" placeholder="Enter jam" name="jam"
                                value="<?php echo $data_jadwal['jam'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="text" class="col-sm-2 col-form-label">MataKuliah</label>
                        <div class="col-sm-10">
                        <select name="MataKuliah" class="form-control">
								<?php
                                while ($kul = mysqli_fetch_array($mat)) { ?>
								<option value="<?= $kul['id_matkul'] ?>" <?= $data_jadwal['id_matkul'] == $kul
	                                	['id_matkul'] ? 'selected' : null ?>><?= $kul['matakuliah'] ?>
								</option>';
								<?php }
                                ?>
							</select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="text" class="col-sm-2 col-form-label">Dosen </label>
                        <div class="col-sm-10">
                        <select name="nama_dosen" class="form-control">
								<?php
                                while ($d = mysqli_fetch_array($dos)) { ?>
								<option value="<?= $d ['id_dosen'] ?>" <?= $data_jadwal['id_dosen'] == $d
	                                	['id_dosen'] ? 'selected' : null ?>><?= $d['nama_dosen'] ?>
								</option>';
								<?php }
                                ?>
							</select>
                        </div>
                    </div>
                    <button style="float: right;" type="submit" class="btn btn-success">Simpan</button>
    								<a style="float: right; margin-right: 10px" href="data_jadwal.php" type="button" class="btn btn-danger">Batal</a>
                    <br>
                </form>
            </div>
        </div>
    </div>
    <br>
</body>
</head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</html>
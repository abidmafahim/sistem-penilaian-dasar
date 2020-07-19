<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?php echo base_url() ?>Admin/EdDatSiswa/<?php echo $data['id_siswa'] ?>" method="POST">
		NIS <input type="number" name="nis" value="<?php echo $data['nis'] ?>"><br>
		Nama Siswa <input type="text" name="nama_siswa" value="<?php echo $data['nama_siswa'] ?>">
		Kelas <select name="kelas">
			<?php
			$query = $this->M_Admin->GetKelas()->result();
			foreach ($query as $key) {
				?>
				<option value="<?php echo $key->id_kelas ?>"><?php echo $key->tingkat_kelas; ?> <?php echo $key->kd_progstud;?> <?php echo $key->urut_kelas; ?></option>
			<?php } ?>
		</select>
		<input type="submit" name="submit">
	</form>
</body>
</html>
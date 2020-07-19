<!DOCTYPE html>
<html>
<?php $this->load->view('fitur/guru/head') ?>
<body>
	<form action="<?php echo base_url('Admin/InsertSiswa') ?>" method="POST">
		NIS <input type="number" name="nis"><br>
		Nama Siswa <input type="text" name="nama_siswa"><br>
		Kelas <select name="kelas" class="form-control select2" style="width: 100%;">
			<?php
			$query = $this->M_Admin->GetKelas()->result();
			foreach ($query as $key) {
				?>
				<option value="<?php echo $key->id_kelas ?>"><?php echo $key->tingkat_kelas; ?> <?php echo $key->kd_progstud;?> <?php echo $key->urut_kelas; ?></option>
			<?php } ?>
		</select>
		<input type="submit" name="submit">
	</form>
	<?php $this->load->view('fitur/guru/javascript') ?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style-icon.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/DataTable/jquery.dataTables.min.css">
</head>
<body>
	<?php
	$query = $this->M_Admin->GetPengajar()->result();
	?>
	<form action="<?php echo base_url('Admin/InsertPengajar') ?>" method="POST">
		<table>

			<tr>
				<td>NIP</td>
				<td>
					<input list="nip_guru" name="nip" autocomplete="off">
					<datalist id="nip_guru">
						<?php
						foreach ($query as $key) {
							?>
							<option value="<?php echo "$key->nip" ?>"><?php echo "$key->nama_guru"; ?></option>
						<?php } ?>
					</datalist>
				</td>
			</tr>

			<tr>
				<td>Nama Guru</td>
				<td>
					<input list="nama_guru" name="nm_guru" autocomplete="off">
					<datalist id="nama_guru">
						<?php
						foreach ($query as $key) {
							?>
							<option value="<?php echo "$key->id_guru" ?>"><?php echo "$key->nama_guru"; ?></option>
						<?php } ?>
					</datalist>
				</td>
			</tr>

			<tr>
				<td>Mata Pelajaran</td>
				<td>
					<input list="ma_pel" name="mapel">
					<datalist id="ma_pel">
						<?php
						foreach ($query as $key) {
							?>
							<option value="<?php echo "$key->kd_mapel" ?>"><?php echo "$key->nama_mapel"; ?></option>
						<?php } ?>
					</datalist>
				</td>
			</tr>

			<tr>
				<td>Kelas</td>
				<td>
					<input list="kelas" name="kls" autocomplete="off">
					<datalist id="kelas">
						<?php
						foreach ($query as $key) {
							?>
							<option value="<?php echo "$key->id_kelas" ?>"><?php echo "$key->tingkat_kelas";?> &#47 <?php echo "$key->kd_progstud"; ?><?php echo "$key->urut_kelas"; ?></option>
						<?php } ?>
					</datalist>
				</td>
			</tr>

			<tr>
				<td><input type="submit" name="submit" value="Tambah"></td>
			</tr>

		</table>
	</form>
</body>
</html>
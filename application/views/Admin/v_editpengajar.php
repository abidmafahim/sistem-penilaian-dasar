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
	$query1 = $this->M_Admin->GetPengajar()->result();
	$query_guru = $this->db->query("SELECT * FROM guru")->result();
	$query_mapel = $this->db->query("SELECT * FROM mapel")->result();
	?>
	<form action="<?php echo base_url() ?>Admin/EdDatPengajar/<?php echo $query['id_pengajar'] ?>" method="POST">
		<table>
			<tr>
				<td>NIP</td>
				<td>
					<input type="text" list="nip_guru" name="nip" autocomplete="off" value="<?php echo $query['nip'] ?>">
					<datalist id="nip_guru">
						<?php
						foreach ($query_guru as $key) {
							?>
							<option value="<?php echo "$key->nip" ?>"><?php echo "$key->nama_guru"; ?></option>
						<?php } ?>
					</datalist>
				</td>
				<td>
					<input type="text" name="bfr" class="form-control" id="disabledInput" placeholder="<?php echo $query['nip'] ?>" disabled readonly>
				</td>
			</tr>

			<tr>
				<td>Mata Pelajaran</td>
				<td>
					<input list="ma_pel" name="mapel" autocomplete="off" value="<?php echo $query['kd_mapel'] ?>">
					<datalist id="ma_pel">
						<?php
						foreach ($query_mapel as $key) {
							?>
							<option value="<?php echo "$key->kd_mapel" ?>"><?php echo "$key->nama_mapel"; ?></option>
						<?php } ?>
					</datalist>
				</td>
			</tr>

			<tr>
				<td>Kelas</td>
				<td>
					<input list="kelas" name="kls" autocomplete="off" value="<?php echo $query['id_kelas'] ?>">
					<datalist id="kelas">
						<?php
						foreach ($query1 as $key) {
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
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
	<a href="<?php base_url(); ?>AddPengajar">Tambah Data</a>
	<table id="datable_1" class="table table-striped table-hover table-bordered table-sm bg-white" border="1">
		<thead>
			<tr>
				<th class="th-sm" style="text-align: center;">No</th>
				<th class="th-sm" style="text-align: center;">NIP</th>
				<th class="th-sm" style="text-align: center;">Nama Guru</th>
				<th class="th-sm" style="text-align: center;">Mata Pelajaran</th>
				<th class="th-sm" style="text-align: center;">Kelas</th>
				<th class="th-sm" style="text-align: center;">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$sql = $this->M_Admin->GetPengajar()->result();
			foreach ($sql as $key) {
				?>
				<tr>
					<td><?php echo "$no"; ?></td>
					<td><?php echo "$key->nip"; ?></td>
					<td><?php echo "$key->nama_guru"; ?></td>
					<td><?php echo "$key->nama_mapel"; ?></td>
					<td><?php echo "$key->tingkat_kelas"; ?> <?php echo "$key->kd_progstud"; ?> <?php echo "$key->urut_kelas"; ?></td>
					<td style="text-align: center;">
						<a class="btn btn-primary btn-sm" href="EditPengajar/<?php echo $key->id_pengajar ?>">Edit</a>
						<a class="btn btn-primary btn-sm" onclick="delfunc()" href="HapusPengajar/<?php echo $key->id_pengajar ?>">Hapus</a>
						<script type="text/javascript">
							function delfunc() {
								confirm("Anda yakin ingin menghapus? Data yang terhapus tidak bisa dikembalikan");
							}
						</script>
					</td>
				</tr>
				<?php 
				$no++; 
			}
			?>
		</tbody>
	</table>
</body>
</html>

<script src="<?php echo base_url() ?>assets/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/DataTable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/DataTable/dataTables-data.js"></script>


<script>
	$(document).ready(function() {
		$('sort').DataTable({
			"paging" : false,
			"ordering" : false,
			"info" : false
		});
	});
</script>
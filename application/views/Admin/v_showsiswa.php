<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="<?php echo base_url() ?>Admin/AddSiswa">Tambah Siswa</a>
	<table border="1">
		<thead>
			<th>No</th>
			<th>Nis</th>
			<th>Nama Siswa</th>
			<th>Kelas</th>
			<th>Aksi</th>
		</thead>
		<tbody>
			<?php
			$no = 1;
			$query = $this->M_Admin->GetSiswa()->result();
			foreach ($query as $key) {
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $key->nis; ?></td>
					<td><?php echo $key->nama_siswa; ?></td>
					<td><?php echo $key->tingkat_kelas; ?> <?php echo $key->kd_progstud; ?> <?php echo $key->urut_kelas; ?></td>
					<td>
						<a href="<?php echo base_url() ?>Admin/EditSiswa/<?php echo $key->id_siswa ?>">Edit</a>
						<a href="">Hapus</a>
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
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="<?php base_url() ?>AddMapel">Tambah</a>
	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Mapel</th>
				<th>Nama Mapel</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$query = $this->M_Admin->GetMapel()->result();
			foreach ($query as $key) {
				?>
				<tr>
					<td><?php echo "$no"; ?></td>
					<td><?php echo "$key->kd_mapel"; ?></td>
					<td><?php echo "$key->nama_mapel"; ?></td>
					<td>
						<a href="EditMapel/<?php echo $key->kd_mapel ?>">Edit</a>
						<a href="HapusMapel/<?php echo $key->kd_mapel ?>">Hapus</a>
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
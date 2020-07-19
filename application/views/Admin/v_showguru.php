<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<body>
	<a href="<?php base_url('') ?>AddGuru">insert</a>
	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>NIP</th>
				<th>Nama Guru</th>
				<th>Alamat</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$query = $this->M_Admin->GetGuru();
			foreach ($query->result() as $key) {					
				?>
				<tr>
					<td><?php echo "$no"; ?></td>
					<td><?php echo "$key->nip"; ?></td>
					<td><?php echo "$key->nama_guru"; ?></td>
					<td><?php echo "$key->alamat_guru"; ?></td>
					<td>
						<a href="DeleteGuru/<?php echo $key->id_guru ?>">Delete</a>
						<a href="EditGuru/<?php echo $key->id_guru ?>">Edit</a>
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
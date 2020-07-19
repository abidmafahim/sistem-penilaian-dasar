<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?php echo base_url() ?>Admin/EdDatGuru/<?php echo $query['id_guru'] ?>" method="POST">
		<tbody>
			<table border="0">
				<?php

				?>
				<tr>
					<td>NIP</td>
					<td><input type="number" name="nip" value="<?php echo $query['nip'] ?>"></td>
				</tr>
				<tr>
					<td>Nama Lengkap</td>
					<td><input type="text" name="nama" value="<?php echo $query['nama_guru'] ?>"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><textarea name="alamat" cols="25" rows="8" style="resize: none;"><?php echo $query['alamat_guru']; ?></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" name="tambah" value="Tambah"></td>
				</tr>
			</table>
		</tbody>
	</form>
</body>
</html>
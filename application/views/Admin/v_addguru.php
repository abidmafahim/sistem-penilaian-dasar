<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?php echo base_url('Admin/InsertGuru') ?>" method="POST">
		<tbody>
			<table border="0">
				<tr>
					<td>NIP</td>
					<td><input type="number" name="nip"></td>
				</tr>
				<tr>
					<td>Nama Lengkap</td>
					<td><input type="text" name="nama"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><textarea name="alamat" cols="25" rows="8" style="resize: none;"></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" name="tambah" value="Tambah"></td>
				</tr>
			</table>
		</tbody>
	</form>
</body>
</html>
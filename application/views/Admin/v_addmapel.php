<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?php echo base_url('Admin/InsertMapel') ?>" method="POST">
		<table>
			<tr>
				<td>Kode Mapel</td>
				<td><input type="text" name="kdmapel"></td>
			</tr>
			
			<tr>
				<td>Nama Mapel</td>
				<td><input type="text" name="nmmapel"></td>
			</tr>

			<tr>
				<td><input type="submit" name="tambah" value="Tambah"></td>
			</tr>
			<tr>
				<td><?php echo $this->session->flashdata('exist'); ?></td>
			</tr>
		</table>
	</form>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style-login.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style-icon.css">
</head>
<body>
	<form action="<?php echo base_url() ?>Admin/EdDatMapel/<?php echo $query['kd_mapel'] ?>" method="POST">
		<tbody>
			<table border="0">
				<?php

				?>
				<tr>
					<td>Kode Mapel</td>
					<td><?php echo form_input($form_kd); ?></td>
				</tr>
				<tr>
					<td>Nama Mapel</td>
					<td><input type="text" name="nmmapel" value="<?php echo $query['nama_mapel'] ?>"></td>
				</tr>
				<tr>
					<td><input type="submit" name="edit" value="Edit"></td>
				</tr>
			</table>
		</tbody>
	</form>
</body>
</html>
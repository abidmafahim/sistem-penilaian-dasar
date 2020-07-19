<!DOCTYPE html>
<html>
<?php echo $this->load->view('fitur/guru/head'); ?>
<body>
<table id="example1" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Siswa</th>
			<th>Nilai Harian</th>
			<th>UTS</th>
			<th>UAS</th>
			<th>Nilai Akhir</th>
			<th>Predikat</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		foreach ($siswakelas->result() as $key) {
			$nh = $key->nilai_harian;
			$uts = $key->uts;
			$uas = $key->uas;

			$nh1 = ($nh * 60) / 100;
			$uts1 = ($uts * 20) / 100;
			$uas1 = ($uas * 20) / 100;
			$na = $nh1 + $uts1 + $uas1;

			$pred = "null";
			if ($na <= 100 && $na > 89) {
				$pred = "A";
			}
			elseif ($na <= 89 && $na > 79) {
				$pred = "B";
			}
			elseif ($na <= 79 && $na > 69) {
				$pred = "C";
			}
			elseif ($na <= 69 && $na > 59) {
				$pred = "D";
			}
			else {
				$pred = "E";
			}

										/*$remedrow;
										if ($na < 70) {
											$remedrow = 
										}*/

										?>
										<tr>
											<td><?php echo $no ?></td>
											<td><?php echo $key->nama_siswa ?></td>
											<td><?php echo $nh ?></td>
											<td><?php echo $uts; ?></td>
											<td><?php echo $uas; ?></td>
											<?php

											?>
											<td><?php echo ceil($na); ?></td>
											<?php


											?>
											<td><?php echo $pred; ?></td>
											<td>
												<a href="<?php echo base_url() ?>Guru/EditNilaiSiswa/<?php echo $key->id_kelas ?>/<?php echo $key->kd_mapel ?>" class="btn btn-warning">
													<span class="fa fa-pencil-square-o"></span>
												</a>
												<a href="<?php echo base_url() ?>Guru/ShowNilaiSiswa/<?php echo $key->id_kelas ?>/<?php echo $key->kd_mapel ?>" class="btn btn-danger">
													<span class="fa fa-trash-o"></span>
												</a>
											</td>
										</tr>
										<?php
										$no++;
									}
									?>
								</tbody>
							</table>
							<?php echo $this->load->view('fitur/guru/javascript'); ?>
</body>
</html>

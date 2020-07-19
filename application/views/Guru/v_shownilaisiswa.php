<!DOCTYPE html>
<html>
<?php $this->load->view('fitur/guru/head') ?>
<body class="hold-transition skin-blue sidebar-mini">
	<?php $this->load->view('fitur/guru/navbar') ?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Data Nilai
				<small>Nilai Siswa</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Nilai Siswa</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-8">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Daftar Nilai Siswa</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<?php
							if ($siswakelas->num_rows() < 1) { ?>
								<label>Data masih kosong</label><br>
								<form action="<?php echo base_url() ?>Guru/SiswaToNilai/<?php echo $kls ?>/<?php echo $kdmapel ?>/<?php echo $nip1['id_guru'] ?>" method="POST">
									<button type="submit" class="btn btn-primary">
										<span class="fa fa-plus"></span> &nbsp Tambah Siswa
									</button>
								</form>
								<?php 
							} 
							else{

							}
							?>
							<br>
							<br>
							
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Siswa</th>
										<th>Nilai Harian</th>
										<th>UTS</th>
										<th>UAS</th>
										<th>Nilai Akhir</th>
										<th>Predikat</th>
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
											<!-- <td>
												<a href="<?php echo base_url() ?>Guru/EditNilaiSiswa/<?php echo $key->id_kelas ?>/<?php echo $key->kd_mapel ?>" class="btn-sm btn-warning">
													<span class="fa fa-pencil-square-o"></span>
												</a>
												&nbsp
												<a href="<?php echo base_url() ?>Guru/ShowNilaiSiswa/<?php echo $key->id_kelas ?>/<?php echo $key->kd_mapel ?>" class="btn-sm btn-danger">
													<span class="fa fa-trash-o"></span>
												</a>
											</td> -->
										</tr>
										<?php
										$no++;
									}
									?>
								</tbody>
							</table>
						</div>
						<!-- /.box-body -->
					</div>
				</div>
				<!-- /.col -->
				<div class="col-md-4">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Ubah Nilai</h3>
						</div>
						<div class="box-body">
							<form action="<?php echo base_url() ?>Guru/InsertNilaiSiswa/<?php echo $idpengajar['id_pengajar']?>/<?php echo $kls ?>/<?php echo $kdmapel ?>/<?php echo $nip1['id_guru'] ?>" method="POST" class="form-group">
								<label>Nama Siswa</label>
								<?php
								if ($siswakelas->num_rows() < 1) { ?>
									<select name="nmsiswa" class="form-control select2" disabled="" style="width: 100%;">
										
										<option>Data siswa masih kosong</option>

									</select>
									<?php
								}
								else{ ?>
									<select name="nmsiswa" class="form-control select2" style="width: 100%;">
										<?php
										$siswa = $this->M_Guru->GetNamaSiswa($kls);
										foreach ($siswa->result() as $key) {
											?>
											<option value="<?php echo $key->id_siswa ?>"><?php echo $key->nama_siswa; ?></option>
											<?php
										}
										?>
									</select>
								<?php } ?>
								<br>
								<label>Total Nilai Harian</label>
								<input name="nilai_harian" class="form-control" type="number" required="">
								<br>
								<label>Nilai UTS</label>
								<input name="nilai_uts" class="form-control" type="number" required="">
								<br>
								<label>Nilai UAS</label>
								<input name="nilai_uas" class="form-control" type="number" required="">
								<br>
								<?php 
								if ($siswakelas->num_rows() < 1) { ?>
									<button type="submit" name="submit" class="btn btn-warning disabled" disabled><span class="fa fa-edit"></span>&nbsp Ubah Nilai</button>
									<?php
								}
								else{ ?>

									<button type="submit" name="submit" class="btn btn-warning"><span class="fa fa-edit"></span>&nbsp Ubah Nilai</button>
								<?php } ?>
							</form>
						</div>
						<div class="box-footer">
							
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<?php $this->load->view('fitur/guru/javascript') ?>
	
</body>
</html>
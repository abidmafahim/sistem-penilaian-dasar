<!DOCTYPE html>
<html>
<?php $this->load->view('fitur/guru/head'); ?>
<body class="hold-transition skin-blue sidebar-mini" style="background-color: #222D32 !important">
	<?php $this->load->view('fitur/guru/navbar') ?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Dashboard
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="Home"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="info-box bg-aqua">
						<span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Bookmarks</span>
							<span class="info-box-number">41,410</span>

							<div class="progress">
								<div class="progress-bar" style="width: 70%"></div>
							</div>
							<span class="progress-description">
								70% Increase in 30 Days
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="info-box bg-yellow">
						<span class="info-box-icon"><i class="fa fa-book"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Kelas Anda</span>
							<h3 style="font-weight: bold;">41,410<sub style="font-size: 10pt;">&nbsp&nbspkelas</sub></h3>
						</div>
						<!-- /.info-box-content -->
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="info-box bg-aqua">
						<span class="info-box-icon"><i class="fa fa-users"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Siswa Anda</span>
							<?php
							$idguru = $nip1['id_guru'];
							$sql_jmsiswa = $this->db->query("select * from nilai join pengajar on nilai.id_pengajar = pengajar.id_pengajar where id_guru = $idguru");
							$jml_siswa = $sql_jmsiswa->num_rows();
							?>
							<h3 style="font-weight: bold;"><?php echo $jml_siswa; ?><sub style="font-size: 10pt">&nbsp&nbspsiswa</sub></h3>
						</div>
						<!-- /.info-box-content -->
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="info-box bg-red">
						<span class="info-box-icon"><i class="fa fa-user"></i></span>

						<div class="info-box-content">
							<span class="info-box-text"remd>Belum Tuntas</span>
							<div class="inner">
								<?php
								// $this->M_Guru->GetSiswaBelumTuntas()->num_rows();
								$idguru = $nip1['id_guru'];
								$sql = $this->db->query("select * from nilai join pengajar on nilai.id_pengajar = pengajar.id_pengajar where id_guru = $idguru and ((nilai_harian * 60) / 100) + ((uts * 20) / 100) + ((uas * 20) / 100) < 70");
								$jumlahremeds = $sql->num_rows()
								?>
								<h3 style="font-weight: bold;"><?php echo $jumlahremeds; ?><sub style="font-size: 10pt">&nbsp&nbspsiswa</sub></h3>
							</div>
						</div>
						<!-- /.info-box-content -->
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->
			<!-- Main row -->
			<div class="row">
				<!-- Left col -->
				<section class="col-lg-12 connectedSortable">
					<!-- Custom tabs (Charts with tabs)-->
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Nilai Siswa Belum Tuntas</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<table id="home" class="table table-bordered">
								<thead>
									<tr>
										<th style="width: 10px;">#</th>
										<th>Nama Siswa</th>
										<th style="width: 100px;">Kelas</th>
										<th style="width: 70px;">Nilai Akhir</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									$sql1 = $this->db->query("select * from nilai join pengajar on nilai.id_pengajar = pengajar.id_pengajar join siswa on nilai.id_siswa = siswa.id_siswa join kelas on siswa.id_kelas = kelas.id_kelas where pengajar.id_guru = $idguru and ((nilai_harian * 60) / 100) + ((uts * 20) / 100) + ((uas * 20) / 100) < 70");
									foreach ($sql1->result() as $key) {
										$nh = $key->nilai_harian;
										$uts = $key->uts;
										$uas = $key->uas;

										$nh1 = ($nh * 60) / 100;
										$uts1 = ($uts * 20) / 100;
										$uas1 = ($uas * 20) / 100;
										$na = $nh1 + $uts1 + $uas1;
										?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $key->nama_siswa; ?></td>
											<td><?php echo $key->tingkat_kelas; ?>&nbsp<?php echo $key->kd_progstud; ?>&nbsp<?php echo $key->urut_kelas; ?></td>
											<td>
												<?php echo $na; ?>
											</td>
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
					<!-- /.nav-tabs-custom -->
				</section>
				
			</div>
			<!-- /.row (main row) -->

		</section> 
		<!-- /.content -->
	</div>
	<?php $this->load->view('fitur/guru/javascript') ?>
</body>
</html>
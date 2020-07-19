<!DOCTYPE html>
<html>

<?php $this->load->view('fitur/guru/head'); ?>

<body class="hold-transition skin-blue sidebar-mini">
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
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Hover Data Table</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th width="15px">No</th>
										<th>Mata Pelajaran</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									$query =  $this->M_Guru->GetKelasMapel($get_ids);
									foreach ($query->result() as $key) {
										?>
										<tr>
											<td><?php echo $no ?></td>
											<td><?php echo $key->nama_mapel ?></td>
											<td><a href="<?php echo base_url() ?>Guru/ShowNilaiSiswa/<?php echo $key->id_kelas ?>/<?php echo $key->kd_mapel ?>" class="btn btn-warning">
												<span class="fa fa-search"></span>&nbsp&nbspCek Nilai
											</a></td>
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
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<!-- right col -->
	<!-- /.row (main row) -->

	<?php $this->load->view('fitur/guru/javascript') ?>
</body>

</html>
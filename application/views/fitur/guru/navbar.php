<header class="main-header">
		<!-- Logo -->
		<a href="index2.html" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>A</b>LT</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>Admin</b>LITE</span>
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- Messages: style can be found in dropdown.less-->

					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
							<?php
							$s = $nip1['id_guru'];
							$nm = $this->M_Guru->GetName($s);
							// $username = $this->session->userdata('username');
							// $nml = $this->M_Guru->GetUserName($username);
							?>

							<span class="hidden-xs"><?php echo $nm->nama_guru; ?></span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

								<p>
									<?php echo $nm->nama_guru; ?> - <?php echo $nm->nip ?>
									<small>Member since Nov. 2012</small>
								</p>
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="#" class="btn btn-default btn-flat">Setting</a>
								</div>
								<div class="pull-right">
									<a href="#" class="btn btn-default btn-flat">Sign out</a>
								</div>
							</li>
						</ul>
					</li>
					<!-- Control Sidebar Toggle Button -->
					<li>
						<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
					</li>
				</ul>
			</div>
		</nav>
	</header>

	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header">MAIN NAVIGATION</li>
				<li>
					<a href="<?php echo base_url('Guru/Home'); ?>">
						<i class="fa fa-dashboard"></i> <span>Home</span>

					</a>
				</li>

				<li class="treeview active">
					<a href="#">
						<i class="fa fa-files-o"></i>
						<span>Nilai</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<?php
						$idkls = $this->M_Guru->GetKelas($s);
						foreach ($idkls->result() as $key) {

							?>

							<li>
								<a href="<?php echo base_url() ?>Guru/ShowKelasMapel/<?php echo "$key->id_kelas" ?>/<?php echo $s ?>">
									<i class="fa fa-circle-o"></i>
									<?php echo "$key->tingkat_kelas"; ?> <?php echo "$key->kd_progstud"; ?> <?php echo "$key->urut_kelas"; ?>
								</a>
							</li>

							<?php
						}
						?>
					</ul>
				</li>
				<li>
					<a href="">
						<i class="fa fa-book"></i> <span>About</span>
					</a>
				</li>
				
				
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>
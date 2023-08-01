<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Penjadwalan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active">Penjadwalan</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- NOTIFIKASI -->
		<?php
		if ($this->session->flashdata('flash_sks')) { ?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h6>
					<i class="icon fas fa-check"></i>
					Data Berhasil
					<strong>
						<?= $this->session->flashdata('flash_sks');   ?>
					</strong>
				</h6>
			</div>
		<?php } ?>
		<!-- /.row -->
		<!-- list data -->
		<?php
		if (empty($sks)) {
			echo '<div class="alert alert-danger alert-dismissible">';
			echo '<button type="button" class="close" data-dismiss="alert";aria-hidden="true">×</button>';
			echo '<h5><i class="fas fa-times"></i> Alert!</h5>';
			echo 'data Sks Belum Terisi';
			echo '</div>';
		}
		if (empty($penjadwalan)) {
			echo '<div class="alert alert-danger alert-dismissible">';
			echo '<button type="button" class="close" data-dismiss="alert";aria-hidden="true">×</button>';
			echo '<h5><i class="fas fa-times"></i> Alert!</h5>';
			echo 'data Penjadwalan Belum Terisi';
			echo '</div>';
		} else {
			echo '<div class="alert alert-success alert-dismissible">';
			echo '<button type="button" class="close" data-dismiss="alert";aria-hidden="true">×</button>';
			echo '<h5><i class="fas fa-check"></i> Alert!</h5>';
			echo 'data Penjadwalan Siap';
			echo '</div>';
		}
		if (empty($rumusan)) {
			echo '<div class="alert alert-danger alert-dismissible">';
			echo '<button type="button" class="close" data-dismiss="alert";aria-hidden="true">×</button>';
			echo '<h5><i class="fas fa-times"></i> Alert!</h5>';
			echo 'data Rumusan Belum Terisi';
			echo '</div>';
		} else {
			echo '<div class="alert alert-success alert-dismissible">';
			echo '<button type="button" class="close" data-dismiss="alert";aria-hidden="true">×</button>';
			echo '<h5><i class="fas fa-check"></i> Alert!</h5>';
			echo 'data Rumusan Siap';
			echo '</div>';
		}
		?>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<!-- card-body -->
					<div class="card-body">
						<?php if (empty($rumusan)) { ?>
							<?php if (!empty($penjadwalan)) { ?>
								<a class="ml-3 btn btn-warning float-right" href="<?= base_url('DataJadwal/rumusan') ?>">Masukkan Rumusan</a>
							<?php } ?>
						<?php } else { ?>
							<a class="ml-3 btn btn-danger float-left" href="<?= base_url('DataJadwal/reset_rumusan') ?>">Reset Rumusan</a>
						<?php } ?>
						<?php
						if (empty($penjadwalan)) {
							if (!empty($sks)) {
						?>
								<a class="ml-3 btn btn-success float-right" href="<?= base_url('DataJadwal/createJadwal') ?>">Buat Jadwal</a>

							<?php
							}
						} else {
							?>
							<a class="ml-3 btn btn-danger float-left" href="<?= base_url('DataJadwal/reset_Jadwal') ?>">Reset Jadwal</a>
						<?php } ?>

						<?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>
							<a class="ml-3 btn btn-warning float-right" href="<?= base_url('DataJadwal/pdf') ?>">export Penjadwalan</a>
							<a class="ml-3 btn btn-danger float-right" href="<?= base_url('DataJadwal/reset_Penjadwalan') ?>">Reset Penjadwalan</a>
							<a class="btn btn-success float-right" href="<?= base_url('DataJadwal/ploting_jadwal') ?>">Ploting Jadwal</a>
							<!-- <a class="btn btn-primary" href="<?= base_url('DataJadwal/tampilJadwalSementara') ?>">tampil jadwal Sementara</a> -->
							<!-- <a class="btn btn-primary" href="<?= base_url('DataJadwal/tampilJadwal') ?>">tampil jadwal</a> -->
						<?php endif; ?>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>

		<div class="row">
			<div class="col-12">
				<div class="callout callout-danger">
					<h5>Jadwal Belum Terplot</h5>
					<table class="table table-bordered">
						<tr>
							<td>Ruangan</td>
							<td>Id Dosen</td>
							<td>Nama Dosen</td>
							<td>Matkul</td>
							<td>SKS</td>
							<td>Jumlah Yang belum Terplot</td>
							<td>Request Jadwal</td>
							<?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>
								<td>Action</td>
							<?php endif; ?>
						</tr>
						<?php
						foreach ($belumterplot as $valueBelumterplot) : ?>
							<tr>
								<td><?= $valueBelumterplot->id_ruangan ?></td>
								<td><?= $valueBelumterplot->id_dosen ?></td>
								<td><?= $valueBelumterplot->nama_dosen ?></td>
								<td><?= $valueBelumterplot->nama_matkul ?></td>
								<td><?= $valueBelumterplot->sks ?></td>
								<td><?= $valueBelumterplot->sisa_jam ?></td>
								<td><?= $valueBelumterplot->hari ?></td>
								<?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>
									<td><button data-tugasdosen="<?= $valueBelumterplot->id_tugas ?>" data-dosen="<?= $valueBelumterplot->nama_dosen ?>" data-matkul="<?= $valueBelumterplot->nama_matkul ?>" data-ruangan="<?= $valueBelumterplot->id_ruangan ?>" data-request="<?= $valueBelumterplot->hari ?>" class="btn btn-primary plotting">Plotting</button></td>
								<?php endif; ?>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
		<!-- aleet untuk ganti jadwal -->
		<div class="row">
			<div class="col-12">
				<div id="pindahruangan">
				</div>
			</div>
		</div>

		<!-- Table Penjadwalan -->
		<?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>
			<div class="row">
				<?php
				$hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at'];
				function filter_jadwal($penjadwalan, $hari, $ruangan, $sesi)
				{
					$data = [];
					foreach ($penjadwalan as $value) {
						if ($value->hari == $hari && $value->sesi == $sesi && $value->id_ruangan == $ruangan) {
							$data[] = $value;
						}
					}
					return $data;
				}
				function getkodeMatkul($matkul, $idMatkul)
				{
					$key = array_search($idMatkul, array_column($matkul, 'id_matkul'));
					return $matkul[$key]->kode_matkul;
				}
				foreach ($hari as $valueHari) :
					$keyJadwal = array_search($valueHari, array_column($jadwal, 'hari'));
					$jumlahSesi = $jadwal[$keyJadwal]->jumlah_;
				?>
					<div class="col-6">
						<div class="card">
							<!-- card-body -->
							<div class="card-body">
								<h3><?= $valueHari ?></h3>
								<table class="table table-bordered table-responsive">
									<tr>
										<th>+</th>
										<?php foreach ($ruangan as $valueRuangan) : ?>
											<th><?= $valueRuangan->id_ruangan ?></th>
										<?php endforeach; ?>
									</tr>
									<?php
									// print_r($penjadwalan);
									for ($i = 0; $i < $jumlahSesi; $i++) { ?>
										<tr>
											<td><?= $i ?></td>
											<?php
											foreach ($ruangan as $valueRuangan) :
												$dataJadwalRuangan = filter_jadwal($penjadwalan, $valueHari, $valueRuangan->id_ruangan, $i);
												if ($dataJadwalRuangan[0]->id_dosen !== null) { ?>
													<td id="<?= $dataJadwalRuangan[0]->id_penjadwalan ?>" class='penjadwalan first' data-ruangan='<?= $valueRuangan->id_ruangan ?>' data-hari='<?= $valueHari ?>' data-jadwal='<?= json_encode($dataJadwalRuangan[0]) ?>' data-request='<?= $dataJadwalRuangan[0]->request ?>' style="padding: 10px; background-color: <?= $dataJadwalRuangan[0]->code_color ?> ;">
														<div>
															<?= '(' . $dataJadwalRuangan[0]->id_dosen . ') ' .  getkodeMatkul($matkul, $dataJadwalRuangan[0]->id_matkul) ?>
														</div>
													</td>
											<?php
												} else {
													$color = 'blue';
													if ($dataJadwalRuangan[0]->keterangan == 'kosong') {
														$color = 'red';
													}
													echo "<td style='color: $color ;' data-request='-' data-dosen='" . $dataJadwalRuangan[0]->id_dosen . "' data-ruangan='$valueRuangan->id_ruangan' data-hari='$valueHari' class='penjadwalan first' data-jadwal='" . json_encode($dataJadwalRuangan[0]) . "'>" . $dataJadwalRuangan[0]->keterangan . "</td>";
												}
											endforeach; ?>
										</tr>
									<?php } ?>
								</table>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->
				<?php
				endforeach; ?>
			</div>
		<?php endif; ?>

		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('pegawai', ['id_pegawai' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Golongan</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item">Data Golongan</div>
			</div>
		</div>
		<div class="section-body">
			<a href="<?= base_url('admin/golongan/create') ?>" class="btn btn-primary btn-s"><i class="fa fa-plus"></i> Tambah Data</a><br><br>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="example">
									<thead>
										<tr>
											<th class="text-center">
												#
											</th>
											<th>ID Golongan</th>
											<th>Nama Golongan</th>
											<th>Tunjangan Golongan</th>
											<th>Tunjangan Suami Istri</th>
											<th>Tunjangan Anak</th>
											<th>Tunjangan Jabatan</th>
											<th>Tunjangan Makan</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($admin as $data) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $data->id_golongan ?></td>
												<td><?= $data->nama_golongan ?></td>
												<td>Rp. <?= rupiah($data->tunjangan_golongan) ?></td>
												<td><?= $data->tunjangan_pasutri ?>%</td>
												<td><?= $data->tunjangan_anak ?>%</td>
												<td>Rp. <?= rupiah($data->tunjangan_jabatan) ?></td>
												<td>Rp. <?= rupiah($data->tunjangan_makan) ?></td>
												<td>
													<a href="<?php echo base_url('admin/golongan/edit/') . $data->id ?>" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i> </a>
													<a href="<?php echo base_url('admin/golongan/delete/') . $data->id ?>" class="btn btn-danger" onclick="javascript: return confirm('Are you sure want to Delete ?')" title="Delete"><i class="fa fa-trash"></i></a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>
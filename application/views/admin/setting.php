<title>Setting</title>
<div class="main-content">
	<div class="container">
			<div class="row justify-content-center">
		<section class="section">
			<div class="section-header">
				<h1>Setting</h1>
			</div>

			<div class="section-body">
				<div class="container-fluid">
					<div class="card">
						<h5 class="card-header">Profil Bengkel</h5>
						<div class="card-body">
							<!--Profil Bengkel dan Data Tentang -->
							<div class="row">
								<div class="col-md-4">
									<img src="<?php echo base_url('/assets/img/bengkel1.png') ?>" alt="" class="card-img-top">
								</div>
								<div class="col-md-8">
									<a href="<?php echo base_url().'Tentang/add'?>" class="btn btn-sm btn-primary"><i class="fas fa-plus fa-sm"> Tambah Data</i></a>
									<br>
									<br>
									<table class="table">
										<tr>
											<th>Menu Tentang</th>
											<th>Isi Tentang</th>
											<th colspan="3">Aksi</th>
										</tr>
										<?php foreach ($tentang as $ttg) : ?>
											<tr>
												<td><?php echo $ttg->menuTentang ?></td>
												<td><?php echo $ttg->deskripsi ?></td>
												<td><?php echo anchor('Tentang/edit/' . $ttg->idTentang, ' <div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
												<td><?php echo anchor('Tentang/delete/' . $ttg->idTentang, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
											</tr>
										<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>



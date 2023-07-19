<head>
	<title>Tentang Kami</title>
</head>
<div class="card">
	<div class="card-header">
		<h4>Tentang Kami</h4>
	</div>
	<!-- Data Tentang Kami -->
	<div class="card-body">
		<div class="row">
			<div class="col-4">
				<div class="list-group" id="list-tab" role="tablist">
					<a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab">Utama</a>
					<?php foreach ($tentang as $ttg) : ?>
						<a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-<?php echo $ttg->idTentang ?>" role="tab"><?php echo $ttg->menuTentang ?></a>
						<?php endforeach; ?>
					</div>
				</div>
			<div class="col-8">
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
						<h6 style="font-size: 20px">Bengkel Berkah Abadi motor adalah bengkel sepeda motor yang menawarkan jasa perawatan, servis dan penjualan spare part untuk segala jenis sepeda motor. Berkah Abadi Motor telah berdiri selama 10 tahun yang tersebar di berbagai daerah yaitu Cilacap, Solo, Kediri, dan Jember. Khusus untuk cabang Jember berlokasi di Jl.Semeru No.36 Ajung Pancakarya, Kabupaten Jember. Dengan pengalaman yang telah didapat, kami siap memberikan pelayanan yang lebih lengkap dan menyeluruh dengan berbagai keunggulan baru bagi setiap pelanggan.</h6>
					</div>
					<?php foreach ($tentang as $ttg) : ?>
						<div class="tab-pane fade" id="list-<?php echo $ttg->idTentang ?>" role="tabpanel" aria-labelledby="list-home-list">
							<h6><?php echo $ttg->deskripsi ?></h6>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
		</div>
	</div>
</div>

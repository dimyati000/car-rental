<title>Invoice</title>

<body>
	<div class="main-wrapper">
		<!-- Main Content -->
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Invoice</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?= site_url('Dashboard') ?>">Dashboard</a></div>
						<div class="breadcrumb-item">Invoice</div>
					</div>
				</div>
    
<div class="container">
		<div class="row justify-content-center">
			<div class="card shadow-lg border-0 rounded-lg mt-50">
    <section class="section">
        <div class="section-header">
            <h1>Invoice Pemesanan Produk</h1>
        </div>
        <div class="section-body">
            <div class="container-fluid">
				<!-- Table Invoice -->
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Alamat Pengiriman</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Batas Pembayaran</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <?php
					$no = 1;
                    foreach ($invoice as $inv) :
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $inv->nama ?></td>
                            <td><?php echo $inv->alamat ?></td>
                            <td><?php echo $inv->tanggalPemesanan ?></td>
                            <td><?php echo $inv->batasPembayaran ?></td>
                            <td>
                                <?php echo anchor('Transaksi/delete/' . $inv->idInvoice, ' <div class="btn btn-sm btn-danger">Hapus</div>') ?>
                            </td>
                            <td>
                                <?php echo anchor('Transaksi/detail/' . $inv->idInvoice, ' <div class="btn btn-sm btn-primary">Detail</div>') ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </section>
</div>
</div>
</div>
</div>

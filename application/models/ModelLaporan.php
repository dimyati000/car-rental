<?php
class ModelLaporan extends CI_Model{
    //ini adalah modal untuk mengambil data dari tb layanan demi kebutuhan laporan pelayanan
    function getDataPenumpang($idSewa="", $created_by="", $tipeSewa="SP"){
		$q = "SELECT fs.idSewa, fs.noSewa, fs.tipeSewa, fs.tglBerangkat, fs.jamBerangkat, fs.tglKembali, fs.jamKembali, fs.rute, fs.muatan, fs.tipeTarif,
		fs.lamaSewa, fs.totalTarif, fs.dp, fs.overtime, fs.kurangBayar, fs.jasaSopir, fs.jasaAntar, fs.totalBayar, fs.klaim, fs.keterangan, fs.created_by, 
		p.namaPelanggan, p.noTelp, p.alamat, m.jenisMobil, m.nopol
		FROM `tb_formsewa` fs
		LEFT JOIN tb_pelanggan p ON fs.pelangganId = p.idPelanggan
		LEFT JOIN tb_mobil m ON fs.mobilId = m.idMobil";
		$q .= " ORDER BY fs.tglBerangkat DESC, fs.noSewa DESC";
		$query = $this->db->query($q);
		return $query;
	}
}
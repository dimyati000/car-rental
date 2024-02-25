<?php
class ModelLaporan extends CI_Model{
    //ini adalah modal untuk mengambil data dari tb layanan demi kebutuhan laporan pelayanan
	function getDataPenumpang($jenisMobil="", $tanggal_awal="", $tanggal_akhir="", $tipeSewa="SP"){
		$q = "SELECT fs.idSewa, fs.noSewa, fs.tipeSewa, fs.tglBerangkat, fs.jamBerangkat, fs.tglKembali, fs.jamKembali, fs.rute, fs.muatan, fs.tipeTarif,
		fs.lamaSewa, cast(fs.totalTarif as decimal) as totalTarif, fs.dp, fs.overtime, fs.kurangBayar, fs.jasaSopir, fs.jasaAntar, fs.totalBayar, fs.klaim, fs.keterangan, fs.created_by, 
		p.namaPelanggan, p.noTelp, p.alamat, m.idMobil, m.jenisMobil, m.nopol,
		(
			SELECT GROUP_CONCAT(j.namaJaminan SEPARATOR ', ') jaminan
			FROM tb_jaminansewa s 
			left join tb_jaminan j on j.idJaminan = s.idJaminan 
			WHERE s.idSewa = fs.idSewa
		) namaJaminan
		FROM `tb_formsewa` fs
		LEFT JOIN tb_pelanggan p ON fs.pelangganId = p.idPelanggan
		LEFT JOIN tb_mobil m ON fs.mobilId = m.idMobil 
		WHERE fs.tipeSewa = '$tipeSewa' ";
		if ($jenisMobil != ""){
			$q .= " and m.idMobil = '$jenisMobil'";
		}
		if ($tanggal_awal != ""){
			$q .= " and fs.tglBerangkat >= '$tanggal_awal'";
		}
		if ($tanggal_akhir != ""){
			$q .= " and fs.tglBerangkat <= '$tanggal_akhir'";
		}
		$q .= " ORDER BY fs.tglBerangkat DESC, fs.noSewa DESC";
		$query = $this->db->query($q);
		return $query;
	}

	function getDataBarang($jenisMobil="", $tanggal_awal="", $tanggal_akhir="", $tipeSewa="SB"){
		$q = "SELECT fs.idSewa, fs.noSewa, fs.tipeSewa, fs.tglBerangkat, fs.jamBerangkat, fs.tglKembali, fs.jamKembali, fs.rute, fs.muatan, fs.tipeTarif,
		fs.lamaSewa, fs.totalTarif, fs.dp, fs.overtime, fs.kurangBayar, fs.jasaSopir, fs.jasaAntar, fs.totalBayar, fs.klaim, fs.keterangan, fs.created_by, 
		p.namaPelanggan, p.noTelp, p.alamat, m.idMobil, m.jenisMobil, m.nopol,
		(
			SELECT GROUP_CONCAT(j.namaJaminan SEPARATOR ', ') jaminan
			FROM tb_jaminansewa s 
			left join tb_jaminan j on j.idJaminan = s.idJaminan 
			WHERE s.idSewa = fs.idSewa
		) namaJaminan
		FROM `tb_formsewa` fs
		LEFT JOIN tb_pelanggan p ON fs.pelangganId = p.idPelanggan
		LEFT JOIN tb_mobil m ON fs.mobilId = m.idMobil 
		WHERE fs.tipeSewa = '$tipeSewa' ";
		if ($jenisMobil != ""){
			$q .= " and m.idMobil = '$jenisMobil'";
		}
		if ($tanggal_awal != ""){
			$q .= " and fs.tglBerangkat >= '$tanggal_awal'";
		}
		if ($tanggal_akhir != ""){
			$q .= " and fs.tglBerangkat <= '$tanggal_akhir'";
		}
		$q .= " ORDER BY fs.tglBerangkat DESC, fs.noSewa DESC";
		$query = $this->db->query($q);
		return $query;
	}


    function getData($idSewa="", $created_by=""){
		$q = "SELECT fs.idSewa, fs.noSewa, fs.tipeSewa, fs.tglBerangkat, fs.jamBerangkat, fs.tglKembali, fs.jamKembali, fs.rute, fs.muatan, fs.tipeTarif,
		fs.lamaSewa, fs.totalTarif, fs.dp, fs.overtime, fs.kurangBayar, fs.jasaSopir, fs.jasaAntar, fs.totalBayar, fs.klaim, fs.keterangan, fs.created_by, 
		p.namaPelanggan, p.noTelp, p.alamat, m.jenisMobil, m.nopol, m.harga12, m.harga24
		FROM `tb_formsewa` fs
		LEFT JOIN tb_pelanggan p ON fs.pelangganId = p.idPelanggan
		LEFT JOIN tb_mobil m ON fs.mobilId = m.idMobil";
		$q .= " ORDER BY fs.tglBerangkat DESC, fs.noSewa DESC";
		$query = $this->db->query($q);
		return $query;
	}

	function getDataLaporan($idSewa="", $created_by=""){
		$q = "SELECT fs.idSewa, fs.noSewa, fs.tipeSewa, fs.tglBerangkat, fs.jamBerangkat, fs.tglKembali, fs.jamKembali, fs.rute, fs.muatan, fs.tipeTarif,
		fs.lamaSewa, fs.totalTarif, fs.dp, fs.overtime, fs.kurangBayar, fs.jasaSopir, fs.jasaAntar, fs.totalBayar, fs.klaim, fs.keterangan, fs.created_by, 
		p.namaPelanggan, p.noTelp, p.alamat, m.jenisMobil, m.nopol, m.harga12, m.harga24
		FROM `tb_formsewa` fs
		LEFT JOIN tb_pelanggan p ON fs.pelangganId = p.idPelanggan
		LEFT JOIN tb_mobil m ON fs.mobilId = m.idMobil";
		$q .= " ORDER BY fs.tglBerangkat DESC, fs.noSewa DESC";
		$query = $this->db->query($q);
		return $query;
	}
}
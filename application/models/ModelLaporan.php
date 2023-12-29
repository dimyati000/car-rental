<?php
class ModelLaporan extends CI_Model{
    //ini adalah modal untuk mengambil data dari tb layanan demi kebutuhan laporan pelayanan
    public function laporanDataPelayanan($filter)
    {   
        $tanggalAwal = $filter['tanggal_awal'];
        $tanggalAkhir = $filter['tanggal_akhir'];
        $jenisLayanan = $filter['jenis_layanan'];
        $query = $this->db->query("
        SELECT * FROM tb_layanan l
        WHERE l.jenisLayanan = '$jenisLayanan'
        AND DATE(l.tanggalPemesanan) BETWEEN '$tanggalAwal' AND '$tanggalAkhir';  
        ");
        return $query;
    }
    
    function getDataPenumpang($idSewa="", $created_by="", $tipeSewa="SP"){
		$q = "SELECT fs.idSewa, fs.noSewa, fs.tipeSewa, fs.tglBerangkat, fs.jamBerangkat, fs.tglKembali, fs.jamKembali, fs.rute, fs.muatan, fs.tipeTarif,
		fs.lamaSewa, fs.totalTarif, fs.dp, fs.overtime, fs.kurangBayar, fs.jasaSopir, fs.jasaAntar, fs.totalBayar, fs.klaim, fs.keterangan, fs.created_by, 
		p.namaPelanggan, p.noTelp, p.alamat, m.jenisMobil, m.nopol,
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
		if ($idSewa != ""){
			$q .= " and idSewa = '$idSewa'";
		}
		if ($created_by != ""){
			$q .= " and created_by = '$created_by'";
		}
		$q .= " ORDER BY fs.tglBerangkat DESC, fs.noSewa DESC";
		$query = $this->db->query($q);
		return $query;
	}


    // //ini adalah modal untuk mengambil data dari tb layanan demi kebutuhan laporan penjualan
    // public function LaporanDataPenjualan($filter)
    // {
    //     $tanggalAwal = $filter['tanggal_awal'];
    //     $tanggalAkhir = $filter['tanggal_akhir'];
    //     $query = $this->db->query("
    //     SELECT i.*, coalesce(ps.jumlah_total, 0) AS jumlah_total, coalesce(ps.harga_total, 0) AS harga_total FROM tb_invoice i
    //     LEFT JOIN (
    //         SELECT p.idInvoice, SUM(p.jumlah) AS jumlah_total, SUM(p.harga) AS harga_total FROM tb_pesanan p
    //         GROUP BY p.idInvoice
    //     ) ps ON i.idInvoice = ps.idInvoice
    //     WHERE DATE(i.tanggalPemesanan) BETWEEN '$tanggalAwal' AND '$tanggalAkhir'; 
    //     ");
    //     return $query;
    // }


    public function tambahLaporan($data, $table)
    {
        return $this->db->insert($table, $data);
    }
    public function editLaporan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function updateData($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function hapusData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
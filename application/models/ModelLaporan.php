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

    // public function laporanDataPelayanan($filter)
    // {   
    //     $jenis_layanan = $filter['jenis_layanan'];
    //     return $this->db->get_where("tb_layanan", array('jenisLayanan' => $jenis_layanan));
        
    // }

    //ini adalah modal untuk mengambil data dari tb layanan demi kebutuhan laporan penjualan
    public function LaporanDataPenjualan($filter)
    {
        $tanggalAwal = $filter['tanggal_awal'];
        $tanggalAkhir = $filter['tanggal_akhir'];
        $query = $this->db->query("
        SELECT i.*, coalesce(ps.jumlah_total, 0) AS jumlah_total, coalesce(ps.harga_total, 0) AS harga_total FROM tb_invoice i
        LEFT JOIN (
            SELECT p.idInvoice, SUM(p.jumlah) AS jumlah_total, SUM(p.harga) AS harga_total FROM tb_pesanan p
            GROUP BY p.idInvoice
        ) ps ON i.idInvoice = ps.idInvoice
        WHERE DATE(i.tanggalPemesanan) BETWEEN '$tanggalAwal' AND '$tanggalAkhir'; 
        ");
        return $query;
    }


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
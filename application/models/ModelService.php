<?php
class ModelService extends CI_Model
{
    public function showDataReg()
    {
        return $this->db->get_where("tb_layanan", array('jenisLayanan' => 'ServiceDibengkel'));
        //    return $this->db->get("tb_layanan");
    }
    public function showDataBooking()
    {
        return $this->db->get_where(
            "tb_layanan",
            array(
                'jenisLayanan' => 'HomeService',
            )
        );
        //    return $this->db->get("tb_layanan");
    }
    public function tambahLayanan($data, $table)
    {
        return $this->db->insert($table, $data);
    }
    public function editLayanan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function updateData($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function detailBooking($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function hapusData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
	public function proses($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function verifikasi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}

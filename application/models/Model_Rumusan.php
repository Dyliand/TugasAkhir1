<?php
class Model_Rumusan extends CI_Model
{
    /* 
    * mengambil semua data rumusan
    * param : hari(null), id ruangan(null)
    */
    public function getDataRumusan($ruangan = null)
    {
        $this->db->select("*");
        $this->db->from('rumusan');
        if ($ruangan != null) {
            $this->db->like('ruangan', $ruangan, 'both');
        }
        $this->db->order_by('`rumusan`.`hasil_rumusan` DESC, `rumusan`.`beban_kerja` DESC');
        return $this->db->get()->result();
    }

    /* 
    * delete semua data rumusan
    */
    public function deleteData()
    {
        $this->db->delete('rumusan');
    }
    /* 
    * tambah data
    */
    public function createData($data)
    {
        foreach ($data as $value) {
            $data = [
                'id_dosen' => $value->id_dosen,
                'hari_request' =>  implode(',', $value->hari),
                'ruangan' => implode(',', $value->ruangan),
                'total' =>  $value->jam_tersedia,
                'beban_kerja' => $value->beban_kerja,
                'hasil_rumusan' => $value->rumusan
            ];
            $this->db->insert('rumusan', $data);
        }
    }

    public function resetRumusan()
    {
        $this->db->empty_table('rumusan');
    }
}

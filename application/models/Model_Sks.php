<?php

/**
 * 
 */
class Model_Sks extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('id_sks, hari, jumlah_sks, lama_sks, jam_mulai');
        $this->db->from('sks');
        return $this->db->get()->result();
    }

    public function tambah_data()
    {
        $hari = $this->input->post('chkJadwalHari');
        foreach ($hari as $value) {
            $data = array(
                'id_sks' => $this->input->post('id_sks'),
                'hari' => $value,
                'jumlah_sks' => $this->input->post('sks'),
                'lama_sks' => $this->input->post('durasi'),
                'jam_mulai' => $this->input->post('waktuMulai')
            );
            $this->db->insert('sks', $data);
        }
    }

    public function hapus_data($id)
    {
        $this->db->delete('sks', ['id_sks' => $id]);
    }

    public function ubah_data()
    {
        $data = array(
            'hari' => $this->input->post('hari'),
            'jumlah_sesi' => $this->input->post('sesi'),
            'lama_sks' => $this->input->post('durasi'),
            'jam_mulai' => $this->input->post('waktuMulai')
        );
        $this->db->where('id_sks', $this->input->post('id_sks', true));
        $this->db->update('sks', $data);
    }


    public function detail_data($id)
    {
        return $this->db->get_where('sks', ['id_sks' => $id])->row_array();
    }
}

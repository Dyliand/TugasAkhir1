<?php

/**
 * 
 */
class Model_Ruangan extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('ruangan')->result();
        $this->db->select('ruangan, ruangan.id_jurusan, jurusan.nama_jurusan, nama_ruangan');
        $this->db->join('jurusan', 'jurusan.id_jurusan = ruangan.id_jurusan');
    }

    public function getAllData_jurusan()
    {
        return $this->db->get('jurusan')->result();
    }

    public function tambah_data()
    {
        $data = array(
            'id_ruangan' => $this->input->post('id_ruang', true),
            'id_jurusan' => $this->input->post('id_jur'),
            'nama_ruangan' => $this->input->post('nm_ruangan', true)
        );

        $this->db->insert('ruangan', $data);
    }

    public function ubah_data()
    {
        $data = array(
            'nama_ruangan' => $this->input->post('nama_ruangan', true),
            'id_jurusan' => $this->input->post('id_jurusan', true)
        );
        $this->db->where('id_ruangan', $this->input->post('id_ruangan', true));
        $this->db->update('ruangan', $data);
    }

    public function hapus_data($id)
    {
        $this->db->delete('ruangan', ['id_ruangan' => $id]);
    }

    public function detail_data($id)
    {
        return $this->db->get_where('ruangan', ['id_ruangan' => $id])->row_array();
    }
}

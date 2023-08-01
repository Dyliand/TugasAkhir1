<?php

/**
 *                                    
 */
class Model_Request extends CI_Model
{
	public function getAllData()
	{
		$this->db->select('id_request, dosen.id_dosen, dosen.nama_dosen, hari');
		$this->db->from('request_jadwal');
		$this->db->join('dosen', 'dosen.id_dosen = request_jadwal.id_dosen');
		return $this->db->get()->result();
	}

	public function getAllDataByid_dosen($id_dosen)
	{
		$query = $this->db->query('SELECT * FROM request_jadwal where id_dosen = "' . $id_dosen . '"');
		if ($query->num_rows() > 0) {
			return $query->row()->hari;
		} else {
			return 'Senin,Selasa,Rabu,Kamis,Jum`at';
		}
	}

	public function tambah_data()
	{
		$hari = $this->input->post("chkHari");
		$data = array(
			'id_dosen' => $this->input->post('id_dos'),
			'id_request' => $this->input->post('id_req'),
			'hari' => implode(',', (array) $hari)
		);
		$this->db->insert('request_jadwal', $data);
	}

	public function hapus_data($id)
	{
		$this->db->delete('request_jadwal', ['id_request' => $id]);
	}

	public function ubah_data()
	{
		$data = array(
			'id_dosen' => $this->input->post('id_dos', true),
			'hari' => $this->input->post('har', true),
		);
		$this->db->where('id_request', $this->input->post('id_req', true));
		$this->db->update('request_jadwal', $data);
	}


	public function detail_data($id)
	{
		return $this->db->get_where('request_jadwal', ['id_request' => $id])->row_array();
	}
}

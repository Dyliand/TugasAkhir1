<?php

/**
 * 
 */
class Model_Penugasan extends CI_Model
{
	public function getAllDataJoin()
	{
		$this->db->select('id_tugas, dosen.id_dosen, matkul.id_matkul, matkul.sks');
		$this->db->from('tugas_dosen');
		$this->db->join('dosen', 'dosen.id_dosen = tugas_dosen.id_dosen');
		$this->db->join('matkul', 'matkul.kode_matkul = tugas_dosen.id_matkul');
		$this->db->join('matkul', 'matkul.sks = tugas_dosen.semester_matkul');
		return $this->db->get()->result();
	}

	public function getAllData_Dosen()
	{
		return $this->db->get('dosen')->result();
	}

	public function getAllData_Matkul()
	{
		return $this->db->get('matkul')->result();
	}

	public function tambah_data()
	{
		$data = array(
			'id_tugas' => $this->input->post('id_dos') .	$this->input->post('id_mat'),
			'id_dosen' => $this->input->post('id_dos'),
			'id_matkul' => $this->input->post('id_mat'),
		);
		$this->db->insert('tugas_dosen', $data);
	}
	/* 
	* mengambil data penugasan dosen dan beban matkul berdasarkan id dosen 
	*/
	/* public function getDataByiddosen($id_dosen)
	{
		$this->db->select('*');
		$this->db->from('tugas_dosen');
		$this->db->join('matkul', 'tugas_dosen.id_matkul = matkul.id_matkul');
		$this->db->where('tugas_dosen.id_dosen',  $id_dosen);
		return $this->db->get()->result();
	} */

	/* 
	* mengambil data penugasan dosen dan beban matkul berdasarkan id dosen dan id ruangan dengan sisa jam !=0
	*/
	public function getDatatugasByidDosen($id_dosen, $id_ruangan)
	{
		$this->db->select('*, dosen.code_color');
		$this->db->from('tugas_dosen');
		$this->db->join('matkul', 'tugas_dosen.id_matkul = matkul.id_matkul');
		$this->db->join('dosen', 'dosen.id_dosen = tugas_dosen.id_dosen');
		$this->db->where('tugas_dosen.id_dosen', $id_dosen);
		$this->db->where('tugas_dosen.id_ruangan', $id_ruangan);
		$this->db->where('tugas_dosen.sisa_sks !=', '0');
		return $this->db->get()->result();
	}



	public function getAllData()
	{
		return $this->db->get('tugas_dosen')->result();
	}

	public function getAllDataByid_ruangan($id_ruangan)
	{
		return $this->db->query("SELECT tugas_dosen.*, matkul.sks, matkul.nama_matkul from tugas_dosen left join matkul on tugas_dosen.id_matkul = matkul.id_matkul where tugas_dosen.id_ruangan= '" . $id_ruangan . "' GROUP by id_tugas")->result();
	}

	public function tugasdosenBelumterplot($id_ruangan = null)
	{
		if ($id_ruangan === null) {
			return $this->db->query("SELECT tugas_dosen.*, matkul.sks, matkul.nama_matkul , dosen.nama_dosen, req_jadwal.hari from tugas_dosen join dosen on tugas_dosen.id_dosen = dosen.id_dosen left join matkul on tugas_dosen.id_matkul = matkul.id_matkul LEFT JOIN req_jadwal ON tugas_dosen.id_dosen = req_jadwal.id_dosen where tugas_dosen.status = 0")->result();
		}
		return $this->db->query("SELECT tugas_dosen.*, matkul.sks, matkul.nama_matkul, dosen.nama_dosen from tugas_dosen join dosen on tugas_dosen.id_dosen = dosen.id_dosen left join matkul on tugas_dosen.id_matkul = matkul.id_matkul LEFT JOIN req_jadwal ON tugas_dosen.id_dosen = req_jadwal.id_dosen where tugas_dosen.id_ruangan= '" . $id_ruangan . "' AND tugas_dosen.status = 0 GROUP by id_tugas")->result();
	}

	public function getTugasdosenJoinmatkulRequestJadwal($id_ruangan = null, $hari = null)
	{
		return $this->db->query("SELECT tugas_dosen.*, matkul.nama_matkul, matkul.sks FROM tugas_dosen LEFT JOIN matkul on matkul.id_matkul = tugas_dosen.id_matkul LEFT JOIN req_jadwal on tugas_dosen.id_dosen = req_jadwal.id_dosen where tugas_dosen.id_ruangan='" . $id_ruangan . "' && tugas_dosen.status='0' && req_jadwal.hari LIKE '%" . $hari . "%' GROUP BY id_tugas");
	}



	public function ubah_data()
	{
		$data = array(
			'id_dosen' => $this->input->post('id_dos', true),
			'id_matkul' => $this->input->post('id_mat', true),
			'id_ruangan' => $this->input->post('id_ruang', true),
		);
		$this->db->where('id_tugas', $this->input->post('id_pen', true));
		$this->db->update('tugas_dosen', $data);
	}

	public function hapus_data($id)
	{
		$this->db->delete('tugas_dosen', ['id_tugas' => $id]);
	}

	public function detail_data($id)
	{
		$this->db->join('matkul', 'tugas_dosen.id_matkul = matkul.id_matkul');
		return $this->db->get_where('tugas_dosen', ['id_tugas' => $id])->row_array();
	}

	public function dataDosen($id_dosen)
	{
		return $this->db->query("SELECT * FROM `dosen`  WHERE dosen.id_dosen = $nama_dosen")->result();
	}


	public function listDataDosenyangKosong()
	{
		return $this->db->query("SELECT dosen.id_dosen, dosen.nama_dosen, sum(case when tugas_dosen.id_tugas IS NULL then 1 else 0 end) AS jumlah_kosong FROM `dosen` INNER join dosen on (dosen.")->result();
	}

	public function hapusDosa()
	{
		return $this->db->query("SELECT * FROM `tugas_dosen` LEFT JOIN matkul ON tugas_dosen.id_matkul = matkul.id_matkul ORDER BY `matkul`.`id_matkul` ASC ")->result();
	}
}

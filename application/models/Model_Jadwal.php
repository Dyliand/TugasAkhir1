<?php

/**
 * 
 */
class Model_Jadwal extends CI_Model
{
	public function getAllData()
	{
		return $this->db->get('jadwal')->result();
	}

	public function getAllDataPenjadwalan()
	{
		$this->db->select('penjadwalan.*, dosen.code_color, dosen.nama_dosen, request_jadwal.hari as request');
		$this->db->join('dosen', 'dosen.id_dosen = penjadwalan.id_dosen', 'left');
		$this->db->join('request_jadwal', 'dosen.id_dosen = request_jadwal.id_dosen', 'left');
		return $this->db->get('penjadwalan')->result();
	}

	public function insertData($hari, $ruangan, $sesi, $kodeJadwal, $keterangan, $jam_mulai, $jam_selesai)
	{
		$data = array(
			'id_ruangan' => $ruangan,
			'hari' => $hari,
			'sesi' => $sesi,
			'kode_jadwal' => $kodeJadwal,
			'keterangan' => $keterangan,
			'jam_mulai' => $jam_mulai,
			'jam_selesai' => $jam_selesai
		);
		$this->db->insert('penjadwalan', $data);
	}

	public function checkingJadwalExist($hari = null, $sesi, $idDosen)
	{
		if ($this->db->query('SELECT * FROM penjadwalan where hari="' . $hari . '" && sesi="' . $sesi . '" && kode_jadwal LIKE %' . $idDosen . '%')->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function checkingJadwalDosen($idDosen)
	{
		if ($this->db->query('SELECT * FROM penjadwalan where kode_jadwal LIKE %' . $idDosen . '%')->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function checkingJadwalTabrakan($hari = null, $sesi, $idDosen)
	{
		return $this->db->query("SELECT * FROM penjadwalan where hari='$hari' && sesi='$sesi' && id_dosen  = '$idDosen'")->result();
	}

	/* 
	*cari jadwal berdasarkan sesi hari dan ruangan
	*/
	public function cariJadwal($sesi, $hari, $id_ruangan)
	{
		return $this->db->query("SELECT * FROM penjadwalan where sesi  = '$sesi' and hari = '$hari' and id_ruangan = '$id_ruangan'")->row();
		// $this->db->where('sesi', $sesi);
		// $this->db->where('hari', $hari);
		// $this->db->where('id_ruangan', $id_ruangan);
		// return $this->db->get('penjadwalan')->row();
	}

	/* 
	* description : mendapatkan data penjadwalan berdasarkan id ruangan dan Hari
	* param : id ruangan , hari(can be null)
	*/
	public function getDataPenjadwalan($idRuangan, $hari, $id_dosen)
	{
		$this->db->select('penjadwalan.*');
		$this->db->from('penjadwalan');
		$this->db->where('id_ruangan', $idRuangan);
		$this->db->where('keterangan', 'kosong');
		$this->db->where('kode_jadwal', '-');
		$this->db->where('hari', $hari);
		$jadwal =  $this->db->get()->result();
		$jadwalDosen = $this->getDataPenjadwalandosen($hari, $id_dosen);
		if ($id_dosen && !empty($jadwalDosen)) {
			$key = [];
			foreach ($jadwalDosen as $value) {
				$ketemu = array_search($value->sesi, array_column($jadwal, 'sesi'));
				if (is_int($ketemu)) {
					$key[] = $ketemu;
				}
			}
			foreach ($key as $value) {
				unset($jadwal[$value]);
			}
		}
		return $jadwal;
	}

	public function getJadwalKosong($idRuangan, $hari = null)
	{
		$this->db->where('kode_jadwal', '-');
		$this->db->where('keterangan', 'kosong');
		$this->db->where('id_ruangan', $idRuangan);
		if ($hari != null) {
			$this->db->where('hari', $hari);
		}
		return $this->db->get('penjadwalan')->result();
	}

	public function getDataPenjadwalandosen($hari, $id_dosen)
	{
		$this->db->select('penjadwalan.*');
		$this->db->from('penjadwalan');
		// $this->db->where('id_ruangan', $idruangan);
		// $this->db->where('keterangan', 'kosong');
		// $this->db->where('kode_jadwal', '-');
		$this->db->where('id_dosen', $id_dosen);
		$this->db->where('hari', $hari);
		return $this->db->get()->result();
	}

	public function getJadwalDosen_Ruangan_Hari($ruangan, $hari, $dosen)
	{
		$this->db->where('id_ruangan', $ruangan);
		$this->db->where('hari', $hari);
		$this->db->where('id_dosen', $dosen);
		$this->db->where('keterangan', 'kosong');
		$this->db->where('kode_jadwal', '-');
		return $this->db->get('penjadwalan')->result();
	}


	public function isiJadwal($ruangan, $hari, $sesi, $id_dosen, $id_matkul, $keterangan, $kode_jadwal)
	{
		if (is_array($sesi)) {
			foreach ($sesi as $value) {
				$data = [
					'id_dosen' => $id_dosen,
					'id_matkul' => $id_matkul,
					'kode_jadwal' => $kode_jadwal,
					'keterangan' => $keterangan
				];

				$this->db->where('sesi', $value);
				$this->db->where('id_ruangan', $ruangan);
				$this->db->where('hari', $hari);
				$this->db->update('penjadwalan', $data);
			}
			$this->updateSisaJam($kode_jadwal, count($sesi), '-');
		} else {
			echo '<br>{sesi error }<br>';
		}
	}

	public function updateSisaJam($id_tugas, $jumlah, $status)
	{
		if ($status == '-') {
			$this->db->query("UPDATE tugas_dosen SET sisa_jam = sisa_jam-$jumlah WHERE id_tugas='" . $id_tugas . "'");
		} else {
			$this->db->query("UPDATE tugas_dosen SET sisa_jam = sisa_jam+$jumlah WHERE id_tugas='" . $id_tugas . "'");
		}
		$dataTugasDosen = $this->db->get_where("tugas_dosen", ['id_tugas' => $id_tugas])->row();
		if ($dataTugasDosen->sisa_jam == 0) {
			$this->updateStatusPenugasan($id_tugas, 1);
		} else {
			$this->updateStatusPenugasan($id_tugas, 0);
		}
	}

	public function updateStatusPenugasan($id_tugas, $status)
	{
		$this->db->query("UPDATE tugas_dosen SET status = '$status' WHERE id_tugas='" . $id_tugas . "'");
	}

	public function resetPenjadwalan()
	{
		$this->db->query('UPDATE penjadwalan SET id_dosen = null, id_matkul = null, kode_jadwal = "-", keterangan = "kosong" WHERE id_dosen != ""');
		$this->db->query('UPDATE tugas_dosen SET status = "0" WHERE status="1"');
		$this->db->query('UPDATE tugas_dosen SET sisa_jam = sks');
	}

	public function resetJadwal()
	{
		$this->db->empty_table('penjadwalan');
	}


	// pemindahan jadwal pertama ke kedua
	public function pindahJadwal_1_2($dataFirst, $dataSecond)
	{
		if ($dataSecond['id_dosen'] == 0) {
			$dataSecond['id_dosen'] = null;
		}
		if ($dataSecond['id_matkul'] == 0) {
			$dataSecond['id_matkul'] = null;
		}

		$data1 = [
			'id_dosen' => $dataSecond['id_dosen'],
			'id_matkul' => $dataSecond['id_matkul'],
			'kode_jadwal' => $dataSecond['kode_jadwal'],
			'keterangan' => $dataSecond['keterangan']
		];
		$this->db->update('penjadwalan', $data1, ['id_penjadwalan' => $dataFirst['id_penjadwalan']]);
	}

	// pemindahan jadwal kedua ke pertama
	public function pindahJadwal_2_1($dataFirst, $dataSecond)
	{
		if ($dataFirst['id_dosen'] == 0) {
			$dataFirst['id_dosen'] = null;
		}
		if ($dataFirst['id_matkul'] == 0) {
			$dataFirst['id_matkul'] = null;
		}
		$data2 = [
			'id_dosen' => $dataFirst['id_dosen'],
			'id_matkul' => $dataFirst['id_matkul'],
			'kode_jadwal' => $dataFirst['kode_jadwal'],
			'keterangan' => $dataFirst['keterangan']
		];
		$this->db->update('penjadwalan', $data2, ['id_penjadwalan' => $dataSecond['id_penjadwalan']]);
	}

	public function pindahJadwal($dataFirst, $dataSecond)
	{
		if ($dataFirst['id_dosen'] == 0) {
			$dataFirst['id_dosen'] = null;
		}
		if ($dataFirst['id_matkul'] == 0) {
			$dataFirst['id_matkul'] = null;
		}
		$data2 = [
			'id_dosen' => $dataFirst['id_dosen'],
			'id_matkul' => $dataFirst['id_matkul'],
			'kode_jadwal' => $dataFirst['id_tugas'],
			'keterangan' => $dataFirst['nama_matkul']
		];
		$this->db->update('penjadwalan', $data2, ['id_penjadwalan' => $dataSecond['id_penjadwalan']]);
	}
}

<?php

use Dompdf\Dompdf;

class DataJadwal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('Model_Jadwal');
		$this->load->model('Model_Matkul');
		$this->load->model('Model_Dosen');
		$this->load->model('Model_Ruangan');
		$this->load->model('Model_Request');
		$this->load->model('Model_Penugasan');
		$this->load->model('Model_Rumusan');
		$this->load->model('Model_Sks');
	}
	public function index($halaman = 'default')
	{
		$data = [
			'rumusan' => $this->Model_Rumusan->getDataRumusan(),
			'belumterplot' => $this->Model_Penugasan->tugasDosenBelumterplot(),
			'ruangan' => $this->Model_Ruangan->getAllData(),
			'penjadwalan' => $this->Model_Jadwal->getAllDataPenjadwalan(),
			'jadwal' => $this->Model_Jadwal->getAllData(),
			'ruangan' => $this->Model_Ruangan->getAllData(),
			'matkul' => $this->Model_Matkul->getAllData(),
			'sks' => $this->Model_Sks->getAllData()
		];
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('View_Jadwal', $data);
		$this->load->view('footer');
	}

	// search jadwal Khusus 
	//public function searchJadwalKhusus($array, $sks, $hari, $ruangan)
	//{
	//foreach ($array as $value) {
	//	if ($value['ruangan'] == $ruangan && $value['hari'] == $hari  && $value['sks'] == $sks) {
	//		return ['id_jadwal' => $value['id_jadwal_khusus'], 'keterangan' => $value['keterangan'], 'durasi' => $value['durasi']];
	//	}
	//	}
	//	return false;
	//}

	//create jadwal
	public function createJadwal()
	{
		$jadwal = $this->Model_Jadwal->getAllData();
		$ruangan = $this->Model_Ruangan->getAllData();

		echo '<table>';
		foreach ($ruangan as $rowRuangan) {
			$kosong = 0;
			echo '<tr>';
			echo '<td>';
			echo "jadwal ruangan" . $rowRuangan->ruangan . $rowRuangan->nama_jurusan . $rowRuangan->nama_ruangan . "<br>";
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td colspan = "6">';
			echo 'Matkul : ';
			// $tugasdosen = $this->PenugasanModel_Dosen->getAllDataByid_ruangan($rowRuangan->id_ruangan);
			// foreach ($tugasdosen as $dataTugasdosen) {
			// 	$requestHari = $this->RequestModel_Jadwal->getAllDataByid_dosen($dataTugasdosen->id_dosen);
			// 	$totalBebanJam += $dataTugasdosen->sks;
			// 	echo $dataTugasdosen->id_tugas . ' : ' . $dataTugasdosen->nama_matkul .  '=>' . $dataTugasdosen->sks  . '(' . $requestHari . ')' . ' <br>';
			// }
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			foreach ($jadwal as $rowJadwal) {
				echo '<td>';
				echo "===================<br>";
				echo $rowJadwal->hari;
				echo "<br>";
				echo "=================== <br>";
				$jam_mulai = strtotime($rowJadwal->jam_mulai);
				for ($i = 0; $i < $rowJadwal->jumlah_sks; $i++) { {
						$idJadwal = '-';
						$keterangan = "kosong";
						$lama_sks = $rowJadwal->lama_sks;
						$kosong++;
					}
					$jam_selesai = date("H:i", strtotime('+' . $lama_sks . ' minutes', $jam_mulai));
					$this->Model_Jadwal->insertData($rowJadwal->hari, $rowRuangan->id_ruangan, $i, $idJadwal, $keterangan, date("H:i", $jam_mulai), $jam_selesai);
					echo $i . " " . $idJadwal . " " . $keterangan . " " . date("H:i", $jam_mulai) . "-" . $jam_selesai . "<br>";
					$jam_mulai = strtotime($jam_selesai);
				}
				echo '</td>';
			}
			echo '</tr>';
			echo '<td>';
			echo 'jumlah jadwal kosong : ' . $kosong;
			echo '</td>';
			echo '</tr>';
		}
		echo '</table>';
		redirect('DataJadwal');
	}

	public function tampilJadwal()
	{
		$data = [
			'belumterplot' => $this->Model_Penugasan->tugasDosenBelumterplot(),
			'ruangan' => $this->Model_Ruangan->getAllData(),
			'penjadwalan' => $this->Model_Jadwal->getAllDataPenjadwalan(),
			'jadwal' => $this->Model_Jadwal->getAllData(),
			'ruangan' => $this->Model_Ruangan->getAllData(),
			'matkul' => $this->Model_Matkul->getAllData()
		];
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('View_Jadwal', $data);
		$this->load->view('footer');
	}

	public function tampilJadwalSementara()
	{
		$jadwal = $this->Model_Jadwal->getAllData();
		$ruangan = $this->Model_Ruangan->getAllData();
		echo '<table>';
		foreach ($ruangan as $rowRuangan) {
			$kosong = 0;
			echo '<tr>';
			echo '<td>';
			echo "jadwal ruangan" . $rowRuangan->ruangan . $rowRuangan->nama_jurusan . $rowRuangan->nama_ruangan . "<br>";
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td colspan = "6">';
			echo 'Matkul yang belum : ';
			// $tugasdosen = $this->PenugasanModel_Dosen->getAllDataByid_ruangan($rowruangan->id_ruangan);
			$tugasDosen = $this->Model_Penugasan->tugasDosenBelumterplot($rowRuangan->id_ruangan);
			$totalSks = 0;
			// echo "<pre>";
			// print_r($tugasDosen);
			// echo "</pre>";
			foreach ($tugasDosen as $dataTugasDosen) {

				$requestHari = $this->Model_Request->getAllDataByid_dosen($dataTugasDosen->id_dosen);
				$totalBebanJam += $dataTugasDosen->sks;
				echo "$dataTugasDosen->id_tugas  :  $dataTugasDosen->nama_matkul ($dataTugasDosen->sks) => $dataTugasDosen->sisa_jam   ( $requestHari )  <br>";
			}
			echo 'total sks : ' . $totalSks;
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			foreach ($jadwal as $rowJadwal) {
				echo '<td>';
				echo "===================<br>";
				echo $rowJadwal->hari;
				echo "<br>";
				echo "=================== <br>";
				$jam_mulai = strtotime($rowJadwal->jam_mulai);
				for ($i = 0; $i < $rowJadwal->jumlah_sks; $i++) {
					if (is_array($khusus = $this->searchJadwalKhusus($jadwalKhusus, $i, $rowJadwal->hari, $rowRuangan->ruangan))) {
						$idJadwal = $khusus['id_jadwal'];
						$keterangan = $khusus['keterangan'];
						$lama_sks = $khusus['durasi'];
					} else {
						$penjadwalan_dosen = $this->Model_Jadwal->cariJadwal($i, $rowJadwal->hari, $rowRuangan->id_ruangan);
						// $idJadwal = $penjadwalan_dosen->id_penjadwalan;
						$keterangan = "($penjadwalan_dosen->id_dosen) $penjadwalan_dosen->keterangan";
						$idJadwal = "";
						// $keterangan = "";
						$lama_sks = $rowJadwal->lama_sks;
						// $kosong++;
					}
					$jam_selesai = date("H:i", strtotime('+' . $lama_sks . ' minutes', $jam_mulai));
					// $this->Model_Jadwal->insertData($rowJadwal->hari, $rowruangan->id_ruangan, $i, $idJadwal, $keterangan, date("H:i", $jam_mulai), $jam_selesai);
					echo $i . " " . $idJadwal . " " . $keterangan . " " . date("H:i", $jam_mulai) . "-" . $jam_selesai . "<br>";
					$jam_mulai = strtotime($jam_selesai);
				}
				echo '</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<td>';
			// echo 'jumlah jadwal kosong : ' . $kosong;
			echo '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}

	/* 
	* mendapatkan data dosen dan kehadirannya
	* rumusan berfungsi untuk menentukan prioritas dosen mana yang perlu di masukan dahulu
	 */
	public function rumusan()
	{
		$result = $this->Model_Dosen->getDataDosenJoinRequest();

		foreach ($result as $key => $value) {
			if (!$value->id_request) {
				// tambah data bila ada Dosen yang tidak request
				$value->hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
				$status = 0;
				$result[$key]->status_request = $status;
			} else {
				// convert data string to array
				$value->hari = explode(",", $value->hari);
				$status = 1;
				$result[$key]->status_request = $status;
			}
			// menambahkan ruangan yang diajar
			$result[$key]->ruangan = $this->Model_Dosen->getDataDosenJoinRuangan($value->id_dosen);
			$ruangan = $result[$key]->ruangan;
			// menambahkan beban kerja Dosen
			$result[$key]->beban_kerja = $this->Model_Dosen->getDataBebanKerja($value->id_dosen);
			// menambahkan total jam tersedia
			$result[$key]->jam_tersedia = $this->Model_Dosen->ketersediaanJam($ruangan, $value->hari);
			// menambahkan hasil rumusan 
			if ($result[$key]->beban_kerja == 0 && $result[$key]->jam_tersedia == 0) {
				$rumusan = 0;
			} else {
				$rumusan = round(($status == 1) ? 1 + ($result[$key]->beban_kerja / $result[$key]->jam_tersedia) : 0 + ($result[$key]->beban_kerja / $result[$key]->jam_tersedia), 2);
			}

			$result[$key]->rumusan = $rumusan;
		}

		echo "<pre>";
		echo print_r($result);
		echo "</pre>";
		/* 
		!create data 
		*/
		$this->Model_Rumusan->createData($result);
		redirect('DataJadwal');
	}


	/* 
	*membuat data penjadwalan 
	*(tujuan agar mudah dibaca)
	*/
	public $jadwal;
	public function CreateDataJadwal($ruangan)
	{
		$hari =  ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
		// $data = [];
		// $dataHari = explode(',', $hari);
		foreach ($hari as $value) {
			$this->jadwal[$value] = $this->Model_Jadwal->getDataPenjadwalan($ruangan, $value);
		}
	}

	/* 
	*mengambildata jadwal yang sudah dibuat bedasarkan hari yang di tentukan
 	*/
	public function getDataJadwal($hari)
	{
		$data = [];
		$dataHari = explode(',', $hari);
		foreach ($dataHari as $value) {
			$data[$value] = $this->jadwal[$value];
		}
		return $data;
	}

	/* 
	* plotting penjadwalan
	*/
	public function ploting_jadwal()
	{
		$dataRuangan = $this->Model_Ruangan->getAllData();
		// data ruangan 
		foreach ($dataRuangan as $valuedataRuangan) {
			$metode = 1;
			$ruangan = $valuedataRuangan->id_ruangan;
			echo "<hr>";
			echo $ruangan;
			// ambil data Dosen dan tugas mengajarnya berdasarkan id ruangan 
			$dataDosen = $this->dataDosen($ruangan);
			// echo "<pre>";
			// print_r($dataDosen);
			// echo "</pre>";
			foreach ($dataDosen as $valueDataDosen) {
				echo '<br>';
				$id_dosen = $valueDataDosen->id_dosen;
				$request = $valueDataDosen->hari_request;
				echo "$id_Dosen";
				echo $valueDataDosen->hari_request . '<br>';
				echo 'mengajar : <br>';
				// echo '<pre>';
				// print_r($valueDataDosen->mengajar);
				// echo '</pre>';
				foreach ($valueDataDosen->mengajar as $valueMengajar) {
					echo "<br>-> $valueMengajar->nama_matkul kel. : $valueMengajar->kelompok_matkul beban : $valueMengajar->sks , ";
					// *pencarian waktu terbaik
					$this->cariWaktuTerbaik($ruangan, $id_dosen, $request, $valueMengajar->sks, $valueMengajar->kelompok_matkul, $metode, $valueMengajar->id_matkul, $valueMengajar->nama_matkul, $valueMengajar->id_tugas);
				}
				echo '<br>';
				// 	break;
			}
			// break;
			echo "<hr>";
			echo "ploting ulang perulangan";
			echo "<hr>";
			$ruanganKosong = $this->Model_Jadwal->getJadwalKosong($ruangan);
			if (count($ruanganKosong) > 0) {
				$tugasDosenBelumterplot = [];
				$dosen = $this->dataDosen($ruangan);
				foreach (array_column($dosen, 'mengajar') as $key => $value) {
					if (!empty($value)) {
						$tugasDosenBelumterplot[] = $dosen[$key];
					}
				}
				foreach ($tugasDosenBelumterplot as $valueDataDosenBelumTerplot) {
					echo '<br>';
					$id_dosen = $valueDataDosenBelumTerplot->id_dosen;
					$request = $valueDataDosenBelumTerplot->hari_request;
					echo $id_dosen . '<br>';
					echo $valueDataDosenBelumTerplot->hari_request . '<br>';
					echo 'mengajar : <br>';
					print_r($valueDataDosenBelumTerplot->mengajar);
					echo '<br>';
					foreach ($valueDataDosenBelumTerplot->mengajar as $valueMengajar) {
						echo "<br>-> $valueMengajar->nama_matkul kel. : $valueMengajar->kelompok_matkul sisa beban jam  : $valueMengajar->sisa_jam , ";
						// echo "<br>-> $valueMengajar->nama_matkul kel. : $valueMengajar->kelompok_matkul sisa beban jam  : $valueMengajar->sks , ";
						// *pencarian waktu terbaik
						// $this->cariWaktuTerbaik($ruangan, $id_Dosen, $request, $valueMengajar->sks, $valueMengajar->kelompok_matkul, $metode++, $valueMengajar->id_matkul, $valueMengajar->nama_matkul, $valueMengajar->id_tugas);
						$this->cariWaktuTerbaik($ruangan, $id_dosen, $request, $valueMengajar->sisa_jam, $valueMengajar->kelompok_matkul, $metode++, $valueMengajar->id_matkul, $valueMengajar->nama_matkul, $valueMengajar->id_tugas);
					}
					echo '<br>';
				}

				$ruanganKosong = $this->Model_Jadwal->getJadwalKosong($ruangan);
				if (count($ruanganKosong) > 0) {
					echo '<br>';
					echo '=============================';
					echo "JADWAL STUCK";
					echo '=============================';
					echo '<br>';
				}
			}
		}
		redirect('DataJadwal');
	}

	/* 
	* ambil data Dosen yang mengajar di ruangan beserta kewajiban mengajarnya
	*/
	public function dataDosen(String $ruangan)
	{
		$dataDosen = $this->Model_Rumusan->getDataRumusan($ruangan);
		foreach ($dataDosen as $key => $valuedataDosen) {
			$dataDosen[$key]->mengajar = $this->Model_Penugasan->getDatatugasByidDosen($valuedataDosen->id_dosen, $ruangan);
		}
		return (array) $dataDosen;
	}

	/* 
	* mencari jam terbaik
	*/
	public function cariWaktuTerbaik($ruangan, $id_dosen, $hari, $bebanJam, $kelompokMatkul, $metode = 1, $id_matkul, $nama_matkul, $id_tugas)
	{
		/*
		* jumlah pembagian jam 
		* cek apakah ada jadwal yg ngepress
		* cek apakah ada jadwal yang ada tapi tidak ngpress
		* jika sudah tidak ada tambahi metode
		* kalau sudah tidak bisa maka geser
		* kalau sudah tidak bisa lagi maka kepepet
		*/

		$pembagianJam = $this->pembagianWaktu($kelompokMatkul, $bebanJam, $metode);
		$dataHari = explode(',', $hari);
		foreach ($pembagianJam as $valuePembagianjam) {
			$hasilJadwal = $this->jadwalPas($ruangan, $valuePembagianjam, $dataHari, $id_dosen);
			// * cek hasil statusnya
			switch ($hasilJadwal['status']) {
				case 'Press':
					echo " sks press";
					$status = '<div style="background-color: #c82333">error</div>';
					echo "<br>";
					print_r($hasilJadwal['sks']);
					echo "<br>";

					foreach ($hasilJadwal['sesi'] as $keyHariJadwal => $sesi) {
						$jadwaltersedia = $this->Model_Jadwal->getJadwalDosen_Ruangan_Hari($ruangan, $keyHariJadwal, $id_dosen);
						if (count($jadwaltersedia) == 0) {
							$saranSesi = [];
							foreach ($sesi as $valueSesi) {
								$saranSesi = $this->sesiUrut($ruangan, $keyHariJadwal, $valueSesi);
							}
							if (!empty($saranSesi)) {
								$this->Model_Jadwal->isiJadwal($ruangan, $keyHariJadwal, $saranSesi, $id_dosen, $id_matkul, $nama_matkul, $id_tugas);
								$status = "<div style='background-color: #218838;'>sukses</div>";
								break;
							}
						}
					}
					echo "<br>";
					echo "$status : ";
					print_r($saranSesi);
					echo "<br>";
					break;
				case 'tidakPress':
					echo "<br>";
					echo "<div style='background-color: #7FFFD4 ;'>proses dahulu</div>";
					$tempTotal = 0;
					$hariyangdipilih = '';
					$status = '<div style="background-color: #c82333">error</div>';

					foreach ($hasilJadwal['sesi'] as $keyHariJadwal => $sesi) {
						$jadwaltersedia = $this->Model_Jadwal->getJadwalDosen_Ruangan_Hari($ruangan, $keyHariJadwal, $id_dosen);
						if (count($jadwaltersedia) == 0) {
							if ($tempTotal < count($sesi)) {
								$tempTotal = count($sesi);
								$hariyangdipilih = $keyHariJadwal;
							}
						}
					}
					echo "---$hariyangdipilih==>temp Total : " . $tempTotal . "---<br>";

					if ($hariyangdipilih == '') {
						foreach ($hasilJadwal['sesi'] as $keyHariJadwal => $sesi) {
							// echo "<br>";
							// echo "tidak ada pilihan lain jumlah jadwal " . count($jadwaltersedia);
							if ($tempTotal < count($sesi)) {
								$tempTotal = count($sesi);
								$hariyangdipilih = $keyHariJadwal;
							}
						}
						echo 'hari yang dipilih kosong';
					}

					// print_r($hasilJadwal['sesi'][$hariyangdipilih]);
					foreach ($hasilJadwal['sesi'][$hariyangdipilih] as $valueSesi) {
						$saranSesi = $this->sesiUrut($ruangan, $hariyangdipilih, $valueSesi);
						if (!empty($saranSesi)) {
							// $this->Model_Jadwal->isiJadwal($ruangan, $hariyangdipilih, $hasilJadwal['sesi'][$hariyangdipilih][0], $id_Dosen, $id_matkul, $nama_matkul, $id_tugas);
							$this->Model_Jadwal->isiJadwal($ruangan, $hariyangdipilih, $saranSesi, $id_dosen, $id_matkul, $nama_matkul, $id_tugas);
							$status = "<div style='background-color: #218838;'>sukses</div>";
							break;
						}
					}
					echo "<br>";
					echo "$status : ";
					print_r($saranSesi);
					echo "<br>";
					break;
				case 'tidakMuat':
					echo "tidak muat";
					break;
			}
		}
	}

	public function sesiUrut($ruangan, $hari, $sesi)
	{
		$ruangan = $this->Model_Ruangan->detail_data($ruangan)['ruangan'];
		echo "$ruangan === $hari";
		$jumlahSesi = count($sesi);
		$sesiPertama = $sesi[0];
		$sesiBenar = [];
		$tempSesi = 0;
		for ($i = 0; $i < $jumlahSesi; $i++) {
			$tempSesi = $sesiPertama;
			if (is_bool(array_search($tempSesi))) {
				$sesiBenar[] = $sesiPertama;
			} else {
				$i--;
			}
			$sesiPertama++;
		}

		if (empty(array_diff($sesi, $sesiBenar))) {
			return $sesi;
		} else {
			print_r($sesiKhusus);
		}
	}



	/* 
	* memecah jam sks
	*/
	public function pembagianWaktu($kelompokMatkul, $bebanJam, $metodeKe = null)
	{
		switch ($bebanJam) {
			case '8':
				switch ($metodeKe) {
					case '1':
						return [4, 4];
						break;
					case '2':
						return [2, 2, 2, 2];
						break;
					case '3':
						return [5, 3];
						break;
					default:
						return false;
						break;
				}
				break;
			case '7':
				switch ($metodeKe) {
					case '1':
						return [3, 2, 2];
						break;
					case '2':
						return [4, 3];
						break;
					case '3':
						return [5, 2];
						break;
					default:
						return false;
						break;
				}
				break;
			case '6':
				switch ($metodeKe) {
					case '1':
						return [3, 3];
						break;
					case '2':
						return [2, 2, 2];
						break;
					case '3':
						return [4, 2];
					default:
						return false;
						break;
				}
				break;

			case '5':
				switch ($metodeKe) {
					case '1':
						return [3, 2];
						break;
					case '2':
						return [4, 1];
						break;
					default:
						return false;
						break;
				}
				break;
			case '4':
				if ($kelompokMatkul == 'C') {
					switch ($metodeKe) {
						case '1':
							return [4];
							break;
						case '2':
							return [2, 2];
							break;
						default:
							return false;
							break;
					}
				} else {
					return [2, 2];
				}
				break;
			case '3':
				// switch ($metodeKe) {
				// 	case '1':
				// 		return [3];
				// 		break;
				// 	case '2':
				// 		return [2, 1];
				// 		break;
				// }
				return [3];
				break;
			case '2':
				// switch ($metodeKe) {
				// 	case '1':
				// 		return [2];
				// 		break;
				// case '2':
				// 	return [1, 1];
				// 	break;
				// }
				return [2];
				break;
			default:
				return [$bebanJam];
				break;
		}
	}

	/* 
	* function untuk mencari apakah ada jadwal yg ngepress dan berturut turut / hanya bisa di isi saja namun tidak ngepress
	* 
	*/
	public function jadwalPas($ruangan, $pembagianJam, $hari, $id_dosen)
	{
		echo "jumlah hari yang tersedia :" . count($hari) . "<br>";
		echo  "<div style='background-color: #DC143C'>Pembagian_jam ($pembagianJam sks)  -> </div>";
		// echo implode(", ", $pembagianJam);
		// foreach ($pembagianJam as $sks) {
		// echo "value pembagian : $sks <br>";
		$error = 0;
		foreach ($hari as $valueDataHari) {
			$jumlahHariKosong = 0;
			// echo $ruangan;
			echo $valueDataHari;
			$dataJadwal = $this->Model_Jadwal->getDataPenjadwalan($ruangan, $valueDataHari, $id_dosen);
			// echo "</br>";
			// print_r($dataJadwal);
			// echo "</br>";
			$data = [];
			if ($pembagianJam <= count($dataJadwal)) {
				foreach ($dataJadwal as $dataHari) {
					if ($dataHari->kode_jadwal == '-' && $dataHari->keterangan == 'kosong') {
						$jumlahHariKosong++;
						$data[] = $dataHari->sesi;
						if (count($data) == $pembagianJam) {
							$sesi[$valueDataHari][] = $data;
							$data = [];
						}
					} else {
						$data = [];
						$jumlahHariKosong = 0;
					}
				}
				if ($jumlahHariKosong == $pembagianJam) {
					$result =  [
						'status' => 'Press',
						'sesi' => $pembagianBebanJam[$pembagianJam][] = $sesi
					];
				} else if ($jumlahHariKosong > $pembagianJam) {
					$result =  [
						'status' => 'tidakPress',
						'sesi' => $pembagianBebanJam[$pembagianJam][] = $sesi
					];
				} else {
					$result =  [
						'status' => 'ada sesuatu',
					];
				}
			} else {
				$error++;
				if ($error == count($hari)) {
					return [
						'status' => 'tidakMuat'
					];
				}
			}
		}
		// }
		return $result;
	}

	/* 
	* pindah jadwal
	*/

	public function pindahJadwal($status = null)
	{
		if ($status == null) {
			$dataFirst = $this->input->post('dataFirst');
			$dataSecond = $this->input->post('dataSecond');

			if ($dataFirst['id_ruangan'] == $dataSecond['id_ruangan']) {
				// if ($dataFirst['id_dosen'] != null) {
				// 	echo 'dataFirst null';
				// }

				// if ($dataSecond['id_dosen'] != null) {
				// 	echo 'dataSecond null';
				// }
				$cekJadwal1 = $this->Model_Jadwal->checkingJadwalTabrakan($dataFirst['hari'], $dataFirst['sesi'], $dataSecond['id_dosen']);
				$cekJadwal2 = $this->Model_Jadwal->checkingJadwalTabrakan($dataSecond['hari'], $dataSecond['sesi'], $dataFirst['id_dosen']);
				if (count($cekJadwal1) == 0 && count($cekJadwal2) == 0) {
					$this->Model_Jadwal->pindahJadwal_1_2($dataFirst, $dataSecond);
					$this->Model_Jadwal->pindahJadwal_2_1($dataFirst, $dataSecond);
					$data['status'] = 'success';
				} else {
					$data['keterangan'] = 'Jadwal Tabrakan';
					$data['status'] = 'error';
				}
			} else {
				$data['keterangan'] = 'tukar jadwal harus berbeda ruangan';
				$data['status'] = 'error';
			}
			echo json_encode($data);
		} else {
			$tugasDosen = $this->input->post('tugasDosen');
			$dataFirst = $this->Model_Penugasan->detail_data($tugasDosen);
			$dataSecond = $this->input->post('dataSecond');
			$cekJadwal = $this->Model_Jadwal->checkingJadwalTabrakan($dataSecond['hari'], $dataSecond['sesi'], $dataFirst['id_dosen']);
			if (count($cekJadwal) == 0) {
				// echo "this is data first : ";
				// print_r($dataFirst);
				// echo "<br>";
				// echo "this is data second : ";
				// print_r($dataSecond);
				// echo "<br>";
				$this->Model_Jadwal->pindahJadwal($dataFirst, $dataSecond);
				if ($dataSecond['id_dosen'] != null) {
					// echo $dataSecond['kode_jadwal'] . "+,";
					$this->Model_Jadwal->updateSisaJam($dataSecond['kode_jadwal'], 1,  '+');
					$data['status'] = 'success';
				} else {
					$data['status'] = 'success';
				}
				// echo $tugasDosen . "-";
				$this->Model_Jadwal->updateSisaJam($tugasDosen, 1,  '-');
			} else {
				$data['keterangan'] = 'Jadwal Tabrakan';
				$data['status'] = 'error';
			}
			echo json_encode($data);
		}
	}

	/* 
	* ambil hari yang kosong 
	*/
	public function getDataHariKosong($hari, $ruangan)
	{
		foreach ($hari as $valueHari) {
			$dataKosong[$valueHari] = $this->Model_Jadwal->getDataPenjadwalanByIdRuangan($ruangan, $valueHari);
		}
		return $dataKosong;
	}

	public function reset_Penjadwalan()
	{
		$this->Model_Jadwal->resetPenjadwalan();
		redirect('DataJadwal');
	}
	public function reset_rumusan()
	{
		$this->Model_Rumusan->resetRumusan();
		$this->reset_Penjadwalan();
		redirect('DataJadwal');
	}

	public function reset_jadwal()
	{
		$this->Model_Jadwal->resetJadwal();
		redirect('DataJadwal');
	}

	public function pdf($id_dosen = null)
	{
		$data = [
			'belumterplot' => $this->Model_Penugasan->tugasDosenBelumterplot(),
			'ruangan' => $this->Model_Ruangan->getAllData(),
			'penjadwalan' => $this->Model_Jadwal->getAllDataPenjadwalan(),
			'jadwal' => $this->Model_Jadwal->getAllData(),
			'ruangan' => $this->Model_Ruangan->getAllData(),
			'matkul' => $this->Model_Matkul->getAllData(),
			'dosen' => $id_dosen

		];
		if ($id_dosen != null) {
			$data['dosen'] = $this->Model_Dosen->detail_data($id_dosen);
		}
		// export pdf
		// $this->load->library('pdfgenerator');
		// $html = $this->load->view('jadwal/exportPDF', $data, true);
		// $this->pdfgenerator->generate($html, 'tes');
		$this->load->view('exportPDF', $data);
	}

	public function penghapusanDosa()
	{
		$arr = $this->Model_Penugasan->hapusDosa();
		foreach ($arr as $key => $value) {
			if ($value->id_matkul == null) {
				echo $value->id_tugas;
				// $this->Model_Penugasan->hapus_data($value->id_tugas);
			}
		}
	}
}

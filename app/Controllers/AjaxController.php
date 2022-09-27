<?php

namespace App\Controllers;

use App\Models\DaftarKelasModel;
use App\Models\DesaModel;
use App\Models\DosenModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\MahasiswaModel;
use App\Models\JurusanModel;
use App\Models\KelasModel;
use App\Models\MatakuliahModel;
use App\Models\Sekolah;

class AjaxController extends BaseController
{

	function matakuliah()
	{
		$kelas = new KelasModel();
		$dosen = new DosenModel();
		$daftarKelas = new DaftarKelasModel();
		if ($this->request->getVar('action') == 'get_kelas') {
			$datadaftarKelas = $daftarKelas->where('semester', $this->request->getVar('semester_id'))->findAll();
			if ($daftarKelas->where('semester', $this->request->getVar('semester_id'))->findAll()) {
				$response['data1'] = $datadaftarKelas;
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else {
				$response['data1'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			}
		} else {
			$datakelas = $kelas->where('id_kelas', $this->request->getPost('kelas_id'))->findAll();
			if ($kelas->where('id_kelas', $this->request->getPost('kelas_id'))->findAll() && $dosen->where('kode_jurusan', $this->request->getVar('jurusan_id'))->findAll()) {
				for ($i = 0; $i < count($datakelas); $i++) {
					$data = $dosen->where(['nip' => $datakelas[$i]['nip_dosen'], 'kode_jurusan' => $this->request->getVar('jurusan_id')])->findAll();
					if ($data) {
						$data2[] = $data;
						$response['data1'] = $data2;
					} else {
						$response['dataa1'] = '';
					}
				}
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else {
				$response['token'] = csrf_hash();
				echo json_encode($response);
			}
		}
	}

	function validateMatakuliah()
	{
		$matkul = new MatakuliahModel();
		if ($this->request->getVar('action') == 'name') {
			if ($matkul->where('name_matkul', $this->request->getVar('name'))->first()) {
				$response['data1'] = 'nama matkul sudah tersedia';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else {
				$response['data1'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			}
		}

		if ($this->request->getVar('action') == 'no_ruang') {
			if ($matkul->where('no_ruang', $this->request->getVar('no_ruang_val'))->findAll()) {
				$data = $matkul->where('no_ruang', $this->request->getVar('no_ruang_val'))->findAll();
				if ($this->request->getVar('masuk_val') != '' || $this->request->getVar('keluar_val') != '' || $this->request->getVar('hari_val') != '') {
					$dataMasuk = $matkul->where(['no_ruang' => $this->request->getVar('no_ruang_val')])->findAll();
					for ($i = 0; $i < count($dataMasuk); $i++) {
						if ($this->request->getVar('hari_val') == $dataMasuk[$i]['hari']) {
							$masuk_val = explode(':', $this->request->getVar('masuk_val'));
							$keluar_val = explode(':', $this->request->getVar('keluar_val'));
							$masuk_val_db = explode(':', $dataMasuk[$i]['masuk']);
							$keluar_val_db = explode(':', $dataMasuk[$i]['selesai']);
							if (
								$this->request->getVar('masuk_val') >= $dataMasuk[$i]['masuk'] &&
								$this->request->getVar('keluar_val') <= $dataMasuk[$i]['selesai']
							) {
								$response['data1'] = 'block if';
							} else {
								$masuk_val_im = implode($masuk_val);
								$keluar_val_im = implode($keluar_val);
								$masuk_val_db_im = implode($masuk_val_db);
								$keluar_val_db_im = implode($keluar_val_db);
								for ($masuk_val_im; $masuk_val_im < $keluar_val_im; $masuk_val_im++) {
									if ($masuk_val_im == $masuk_val_db_im) {
										$response['data1'] = 'block loop';
										break;
									} else if ($masuk_val_im == $keluar_val_db_im) {
										$response['data1'] = 'block loop else if';
										break;
									} else {
										$response['data1'] = '';
									}
								}
							}
						} else {
							$response['data1'] = '';
						}
					}
				} else {
					$response['data1'] = '';
				}
				// $response['data1'] = $matkul->where('no_ruang', $this->request->getVar('no_ruang_val'))->findAll();
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else {
				$response['data1'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			}
		}
	}

	function validateMatakuliahEdit()
	{
		$matkul = new MatakuliahModel();
		if ($this->request->getVar('action') == 'name') {
			if ($matkul->where('name_matkul', $this->request->getVar('name'))->first()) {
				if ($matkul->where(['name_matkul' => $this->request->getVar('name'), 'kode_matkul' => $this->request->getVar('kode_matkul')])->first()) {
					$response['data1'] = '';
					$response['token'] = csrf_hash();
					echo json_encode($response);
				} else {
					$response['data1'] = 'nama matkul sudah tersedia';
					$response['token'] = csrf_hash();
					echo json_encode($response);
				}
			} else {
				$response['data1'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			}
		}

		if ($this->request->getVar('action') == 'no_ruang') {
			if ($matkul->where('no_ruang', $this->request->getVar('no_ruang_val'))->findAll()) {
				$data = $matkul->where('no_ruang', $this->request->getVar('no_ruang_val'))->findAll();
				if ($this->request->getVar('masuk_val') != '' || $this->request->getVar('keluar_val') != '' || $this->request->getVar('hari_val') != '') {
					$dataMasuk = $matkul->where('no_ruang', $this->request->getVar('no_ruang_val'))->where('kode_matkul !=', $this->request->getVar('kode_matkul'))->findAll();
					for ($i = 0; $i < count($dataMasuk); $i++) {
						if ($this->request->getVar('hari_val') == $dataMasuk[$i]['hari']) {

							$masuk_val = explode(':', $this->request->getVar('masuk_val'));
							$masuk_value_db = explode(':', $this->request->getVar('masuk_value'));
							$keluar_value_db = explode(':', $this->request->getVar('keluar_value'));
							$keluar_val = explode(':', $this->request->getVar('keluar_val'));
							$masuk_val_db = explode(':', $dataMasuk[$i]['masuk']);
							$keluar_val_db = explode(':', $dataMasuk[$i]['selesai']);

							$masuk_val_im = implode($masuk_val);
							$masuk_value_db_im = implode($masuk_value_db);
							$keluar_value_db_im = implode($keluar_value_db);
							$keluar_val_im = implode($keluar_val);
							$masuk_val_db_im = implode($masuk_val_db);
							$keluar_val_db_im = implode($keluar_val_db);
							for ($masuk_val_im; $masuk_val_im < $keluar_val_im; $masuk_val_im++) {
								if ($masuk_val_im == $masuk_val_db_im) {
									$response['data1'] = 'stop';
									break;
								} else if ($masuk_val_im == $keluar_val_db_im) {
									$response['data1'] = 'stop';
									break;
								} elseif ($masuk_val_im == $masuk_value_db_im) {
									$response['data1'] = '';
									break;
								} elseif ($masuk_val_im == $keluar_value_db_im) {
									$response['data1'] = '';
									break;
								} else {
									$response['data1'] = '';
								}
							}
							if ($matkul->where('kode_matkul', $this->request->getVar('kode_matkul'))->first()) {
								$matkulNow = $matkul->where('kode_matkul', $this->request->getVar('kode_matkul'))->first();
								$masukval_now = explode(':', $matkulNow['masuk']);
								$selesaival_now = explode(':', $matkulNow['selesai']);
							}
						} else {
							$response['data1'] = '';
						}
					}
				} else {
					$response['data1'] = '';
				}
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else {
				$response['data1'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			}
		}
	}

	function validateJurusan()
	{
		$jurusan = new JurusanModel();
		$jurusan1 = new JurusanModel();

		if ($jurusan->where('kode', $this->request->getVar('kode'))->first()) {
			if ($jurusan1->where(['kode' => $this->request->getVar('kode'), 'created_at' => $this->request->getVar('created_at')])->first()) {
				$response['validate'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else if ($jurusan->where('kode', $this->request->getVar('kode'))->first()) {
				$response['validate'] = 'kode sudah terdaftar';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else {
				$response['validate'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			}
		} else if ($jurusan->where('name_jurusan', $this->request->getVar('name'))->first()) {
			if ($jurusan1->where(['name_jurusan' => $this->request->getVar('name'), 'created_at' => $this->request->getVar('created_at')])->first()) {
				$response['validate'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else if ($jurusan->where('name_jurusan', $this->request->getVar('name'))->first()) {
				$response['validate'] = 'name sudah terdaftar';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else {
				$response['validate'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			}
		} else {
			$response['validate'] = '';
			$response['token'] = csrf_hash();
			echo json_encode($response);
		}
	}

	function validateDosen()
	{
		$dosen = new DosenModel();
		$dosen1 = new DosenModel();

		if ($dosen->where('email', $this->request->getVar('email'))->first()) {
			if ($dosen1->where(['email' => $this->request->getVar('email'), 'nip' => $this->request->getVar('nip')])->first()) {
				$response['validate'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else if ($dosen->where('email', $this->request->getVar('email'))->first()) {
				$response['validate'] = 'email tidak boleh sama';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else {
				$response['validate'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			}
		} else if ($dosen->where('no_telepon', $this->request->getPost('no_telepon'))->first()) {
			if ($dosen1->where(['no_telepon' => $this->request->getVar('no_telepon'), 'nip' => $this->request->getVar('nip')])->first()) {
				$response['validate'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else if ($dosen->where('no_telepon', $this->request->getPost('no_telepon'))->first()) {
				$response['validate'] = 'no telepon tidak boleh sama';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else {
				$response['validate'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			}
		} else {
			$response['validate'] = '';
			$response['token'] = csrf_hash();
			echo json_encode($response);
		}
	}
	function valid()
	{
		$mahasiswa = new MahasiswaModel();
		$mahasiswa1 = new MahasiswaModel();

		if ($mahasiswa->where('email', $this->request->getVar('email'))->first()) {
			if ($mahasiswa1->where(['email' => $this->request->getVar('email'), 'nim' => $this->request->getVar('nim')])->first()) {
				$response['validate'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else if ($mahasiswa->where('email', $this->request->getVar('email'))->first()) {
				$response['validate'] = 'email tidak boleh sama';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else {
				$response['validate'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			}
		} else if ($mahasiswa->where('NISN', $this->request->getVar('nisn'))->first()) {
			if ($mahasiswa1->where(['NISN' => $this->request->getVar('nisn'), 'nim' => $this->request->getVar('nim')])->first()) {
				$response['validate'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else if ($mahasiswa->where('NISN', $this->request->getVar('nisn'))->first()) {
				$response['validate'] = 'nisn tidak boleh sama';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else {
				$response['validate'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			}
		} else if ($mahasiswa->where('no_telepon', $this->request->getPost('no_telepon'))->first()) {
			if ($mahasiswa1->where(['no_telepon' => $this->request->getVar('no_telepon'), 'nim' => $this->request->getVar('nim')])->first()) {
				$response['validate'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else if ($mahasiswa->where('no_telepon', $this->request->getPost('no_telepon'))->first()) {
				$response['validate'] = 'no telepon tidak boleh sama';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			} else {
				$response['validate'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			}
		} else {
			$response['validate'] = '';
			$response['token'] = csrf_hash();
			echo json_encode($response);
		}
	}

	function wilayah()
	{
		if ($this->request->getVar('wilayah')) {
			$wilayah = $this->request->getVar('wilayah');

			if ($wilayah == 'get_kabupaten') {
				$kabupaten = new KabupatenModel();
				$kabupatenData['kabupaten'] = $kabupaten->where('provinsi_id', $this->request->getVar('provinsi_id'))->findAll();
				$kabupatenData['token'] = csrf_hash();
				return $this->response->setJSON($kabupatenData);
			}

			if ($wilayah == 'get_kecamatan') {
				$kecamatan = new KecamatanModel();

				$kecamatanData['kecamatan'] = $kecamatan->where('kabupaten_id', $this->request->getVar('kabupaten_id'))->findAll();
				$kecamatanData['token'] = csrf_hash();
				echo json_encode($kecamatanData);
			}

			if ($wilayah == 'get_desa') {
				$desa = new DesaModel();
				$desaData['desa'] = $desa->where('kecamatan_id', $this->request->getVar('kecamatan_id'))->findAll();
				$desaData['token'] = csrf_hash();
				echo json_encode($desaData);
			}
		}
	}

	function sekolah()
	{
		$sklh = new Sekolah();

		if ($sklh->where('npsn', $this->request->getVar('npsn'))->first()) {
			$response['validate'] = '';
			$response['token'] = csrf_hash();
			$data = $sklh->where('npsn', $this->request->getVar('npsn'))->first();
			$response['npsn'] = $data['npsn'];
			echo json_encode($response);
		} else {
			$response['validate'] = 'npsn tidak ditemukan';
			$response['token'] = csrf_hash();
			echo json_encode($response);
		}
	}
}

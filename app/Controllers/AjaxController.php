<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\DosenModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\MahasiswaModel;
use App\Models\JurusanModel;
use App\Models\Sekolah;

class AjaxController extends BaseController
{

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

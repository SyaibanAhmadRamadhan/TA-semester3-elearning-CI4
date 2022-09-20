<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\MahasiswaModel;

class WilayahController extends BaseController
{
	function valid(){
        $mahasiswa = new MahasiswaModel();

            if ($mahasiswa->where('email',$this->request->getVar('email'))->first()){
				$response['validate'] = 'email tidak boleh sama';
				$response['token'] = csrf_hash();
				echo json_encode($response);
            }else if ($mahasiswa->where('NISN',$this->request->getVar('nisn'))->first()){
				$response['validate'] = 'nisn tidak boleh sama';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			}else if($mahasiswa->where('no_telepon',$this->request->getPost('no_telepon'))->first()){
				$response['validate'] = 'no_telepon tidak boleh sama';
				$response['token'] = csrf_hash();
				echo json_encode($response);
			}else{
				$response['validate'] = '';
				$response['token'] = csrf_hash();
				echo json_encode($response);

			}
			// if ($mahasiswa->where('no_telepon',$this->request->getPost('no_telepon'))->first()){
            //     session()->setFlashdata('error','nomer telepon sudah terdaftar');
            //     return redirect()->withInput()->back();
            // }
    }

	function action()
	{
		if($this->request->getVar('action'))
		{
			$action = $this->request->getVar('action');

			if($action == 'get_kabupaten'){
				$kabupaten = new KabupatenModel();
				$kabupatenData['kabupaten'] = $kabupaten->where('provinsi_id', $this->request->getVar('provinsi_id'))->findAll();
				$kabupatenData['token'] = csrf_hash();
				return $this->response->setJSON($kabupatenData);
			}

			if($action == 'get_kecamatan'){
				$kecamatan = new KecamatanModel();

				$kecamatanData['kecamatan'] = $kecamatan->where('kabupaten_id', $this->request->getVar('kabupaten_id'))->findAll();
				$kecamatanData['token'] = csrf_hash();
				echo json_encode($kecamatanData);
			}

			if ($action == 'get_desa'){
				$desa = new DesaModel();
				$desaData['desa'] = $desa->where('kecamatan_id',$this->request->getVar('kecamatan_id'))->findAll();
				$desaData['token'] = csrf_hash();
				echo json_encode($desaData);
			}
		}
	}
}

?>
<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarKelasModel;
use App\Models\DosenModel;
use App\Models\JurusanModel;
use App\Models\KelasModel;
use App\Models\MatakuliahModel;
use App\Models\RuangModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class MatakuliahController extends BaseController
{
    public function dataMatakuliah()
    {
        $matkul = new MatakuliahModel();
        $kelas = new DaftarKelasModel();
        $ruangan = new RuangModel();
        $jurusan = new JurusanModel();
        $dosen = new DosenModel();
        foreach ($matkul->findAll() as $x) {
            $dataKelas[] = $kelas->where('id', $x['id_daftar_kelas'])->findAll();
            $noRuang[] = $ruangan->where('id', $x['no_ruang'])->findAll();
            $dataJurusan[] = $jurusan->where('kode', $x['kode_jurusan'])->findAll();
            $dataDosen[] = $dosen->where('nip', $x['nip_dosen'])->findAll();
        }
        return view('admin/matakuliah/data_matakuliah', [
            'title' => 'dataMatakuliah',
            'matkul' => $matkul->findAll(),
            'kelas' => $dataKelas,
            'ruangan' => $noRuang,
            'jurusan' => $dataJurusan,
            'dosen' => $dataDosen
        ]);
    }
    public function addMatakuliah()
    {

        $isValidate = $this->validate([
            'name' => 'required',
        ]);
        if ($isValidate) {
            $name = explode(" ", $this->request->getPost('name'));
            $kode = "";

            foreach ($name as $x) {
                $kode .= $x[0];
            }
            $kode_matkul = strtoupper($kode);

            $matkul = new MatakuliahModel();
            $matkul->insert([
                'kode_matkul' => $kode_matkul,
                'name_matkul' => $this->request->getPost('name'),
                'semester' => $this->request->getPost('semester'),
                'sks' => $this->request->getPost('sks'),
                'no_ruang' => $this->request->getPost('no_ruang'),
                'hari' => $this->request->getPost('hari'),
                'masuk' => $this->request->getPost('masuk'),
                'selesai' => $this->request->getPost('keluar'),
                'kode_jurusan' => $this->request->getPost('jurusan'),
                'nip_dosen' => $this->request->getPost('dosen'),
                'id_daftar_kelas' => $this->request->getPost('kelas'),
            ]);
            return redirect('admin/matakuliah');
        }
        $jurusan = new JurusanModel();
        $ruang = new RuangModel();
        return view('admin/matakuliah/add_matakuliah', [
            'title' => 'addMatakuliah',
            'jurusan' => $jurusan->findAll(),
            'ruang' => $ruang->findAll()
        ]);
    }
    public function editMatakuliah($id)
    {
    }

    public function deleteMatakuliah($id)
    {
        $matkul = new MatakuliahModel();
        $datamatkul = $matkul->where('kode_matkul', $id)->find();
        if (!$datamatkul) {
            throw PageNotFoundException::forPageNotFound();
        }
        $matkul->delete($id);
        return redirect('admin/matakuliah');
    }
}

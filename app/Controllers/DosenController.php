<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AddresModel;
use App\Models\DaftarGelarModel;
use App\Models\DaftarKelasModel;
use App\Models\DosenModel;
use App\Models\GelarModel;
use App\Models\JurusanModel;
use App\Models\KelasModel;
use App\Models\ProvinsiModel;
use App\Models\UsersModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class DosenController extends BaseController
{
    public function addDosen()
    {

        $isValidate = $this->validate([
            'name' => 'required',
            'tgl_lahir' => 'required',
        ]);


        if ($isValidate) {
            $dosen = new DosenModel();

            // nip tahun
            $tahun = date("Y");
            $tahunnip = substr($tahun, 2);

            // count mhs
            $data = $dosen->findAll();
            $totalDosennip = sprintf("%03s", count($data) + 1);

            $nip = $tahunnip . $totalDosennip;

            $data = "syaiban ahmad ramadhan";
            $name = explode(" ", $this->request->getPost('name'));
            $kode = "";

            foreach ($name as $x) {
                $kode .= $x[0];
            }
            $kode_dosen = strtoupper($kode);

            $user = new UsersModel();
            $addres = new AddresModel();
            $kelas = new KelasModel();
            $gelar = new GelarModel();
            if ($this->request->getPost('action') == "false") {
                $datapicture = $this->request->getFile('picture');
                $fileName = $datapicture->getRandomName();
                $dosen->insert([
                    'name' => $this->request->getPost('name'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'email' => $this->request->getPost('email'),
                    'gender' => $this->request->getPost('gender'),
                    'kode_dosen' => $kode_dosen,
                    'no_telepon' => $this->request->getPost('no_telepon'),
                    'asal_universitas' => $this->request->getPost('asal_universitas'),
                    'picture' => $fileName,
                    'kode_jurusan' => $this->request->getPost('jurusan'),
                    'tahun' => date("Y"),
                    'nip' => $nip,
                ]);
                $datapicture->move('uploads/picture/dosen', $fileName);
            } else if ($this->request->getPost('action') == "true") {
                if ($this->request->getPost('gender') == 'pria') {
                    $dosen->insert([
                        'name' => $this->request->getPost('name'),
                        'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                        'email' => $this->request->getPost('email'),
                        'gender' => $this->request->getPost('gender'),
                        'kode_dosen' => $kode_dosen,
                        'no_telepon' => $this->request->getPost('no_telepon'),
                        'asal_universitas' => $this->request->getPost('asal_universitas'),
                        'picture' => 'cowok.jpeg',
                        'kode_jurusan' => $this->request->getPost('jurusan'),
                        'tahun' => date("Y"),
                        'nip' => $nip,
                    ]);
                } elseif ($this->request->getPost('gender') == 'wanita') {
                    $dosen->insert([
                        'name' => $this->request->getPost('name'),
                        'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                        'email' => $this->request->getPost('email'),
                        'gender' => $this->request->getPost('gender'),
                        'kode_dosen' => $kode_dosen,
                        'no_telepon' => $this->request->getPost('no_telepon'),
                        'asal_universitas' => $this->request->getPost('asal_universitas'),
                        'picture' => 'cewek.jpeg',
                        'kode_jurusan' => $this->request->getPost('jurusan'),
                        'tahun' => date("Y"),
                        'nip' => $nip,
                    ]);
                }
            }

            $kelasPost = $this->request->getPost('kelas');
            foreach ($kelasPost as $x) {
                $kelas->insert([
                    'id_kelas' => $x,
                    'nip_dosen' => $nip
                ]);
            }
            $gelarPost = $this->request->getPost('gelar');
            foreach ($gelarPost as $x) {
                $gelar->insert([
                    'id_gelar' => $x,
                    'nip_dosen' => $nip
                ]);
            }
            $user->insert([
                'nip_dosen' => $nip,
                'password' => password_hash($this->request->getPost('tgl_lahir'), PASSWORD_BCRYPT),
                'role' => 'dosen',
            ]);
            $addres->insert([
                'nip_dosen' => $nip,
                'id_provinsi' => $this->request->getPost('provinsi'),
                'id_kabupaten' => $this->request->getPost('kabupaten'),
                'id_kecamatan' => $this->request->getPost('kecamatan'),
                'id_desa' => $this->request->getPost('desa'),
                'detail_alamat' => $this->request->getPost('alamat'),
            ]);
            return redirect('admin/dosen');
        }
        $jurusan = new JurusanModel();
        $prov = new ProvinsiModel();
        $kelas = new DaftarKelasModel();
        $daftarGelar = new DaftarGelarModel();
        $dataProv = $prov->findAll();
        return view('admin/dosen/add_dosen', [
            "title" => "addDosen",
            "provinsi" => $dataProv,
            "jurusan" => $jurusan->findAll(),
            "kelas" => $kelas->findAll(),
            "gelar" => $daftarGelar->findAll()
        ]);
    }

    public function dataDosen()
    {
        $mahasiswa = new DosenModel();
        $dataDosen = $mahasiswa->findAll();
        return view('admin/dosen/data_dosen', [
            "title" => "dataDosen",
            "dosen" => $dataDosen,
        ]);
    }

    public function detailDosen($id)
    {
        $dosen = new DosenModel();
        $kelas = new KelasModel();
        $daftarKelas = new DaftarKelasModel();
        $dafratGelar = new DaftarGelarModel();
        $gelar = new GelarModel();

        $addresDosen = $dosen->addres($id);
        $dataKelas = $kelas->where('nip_dosen', $addresDosen[0]->nip)->findAll();
        $dataGelar = $gelar->where('nip_dosen', $addresDosen[0]->nip)->findAll();
        // array
        for ($i = 0; $i < count($dataKelas); $i++) {
            $namaKelas[] = $daftarKelas->where('id', $dataKelas[$i]['id_kelas'])->first();
        }

        for ($i = 0; $i < count($dataGelar); $i++) {
            $namaGelar[] = $dafratGelar->where('id', $dataGelar[$i]['id_gelar'])->first();
        }
        if (!$addresDosen) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/dosen/detail_dosen', [
            "data" => $addresDosen[0],
            "title" => 'detailDosen',
            "nip" => $id,
            "kelas" => $namaKelas,
            "gelar" => $namaGelar
        ]);
    }

    public function editDosen($id)
    {
        $jurusan = new JurusanModel();
        $prov = new ProvinsiModel();
        $daftarkelas = new DaftarKelasModel();
        $kelas = new KelasModel();
        $dosen = new DosenModel();
        $daftarGelar = new DaftarGelarModel();
        $gelar = new GelarModel();

        $dataDosen = $dosen->addres($id);
        $dataGelar = $gelar->where('nip_dosen', $dataDosen[0]->nip_dosen)->findAll();
        $dataKelas = $kelas->where('nip_dosen', $dataDosen[0]->nip_dosen)->findAll();

        for ($i = 0; $i < count($dataGelar); $i++) {
            $dataDaftarGelar[] = $daftarGelar->where('id', $dataGelar[$i]['id_gelar'])->findAll();
        }

        for ($i = 0; $i < count($dataKelas); $i++) {
            $dataDaftarKelas[] = $daftarkelas->where('id', $dataKelas[$i]['id_kelas'])->findAll();
        }

        $dataProv = $prov->findAll();
        return view('admin/dosen/edit_dosen', [
            "title" => "editDosen",
            "provinsi" => $dataProv,
            "jurusan" => $jurusan->findAll(),
            "kelas" => $daftarkelas->findAll(),
            "gelar" => $daftarGelar->findAll(),
            "data" => $dataDosen[0],
            "dataDaftarGelar" => $dataDaftarGelar,
            "dataDaftarKelas" => $dataDaftarKelas
        ]);
    }

    public function deleteDosen($id)
    {
        $dosen = new DosenModel();

        $datadosen = $dosen->where('nip', $id)->first();
        $picture = $datadosen['picture'];
        if ($picture !== 'cowok.jpeg') {
            if ($picture !== 'cewek.jpeg') {
                unlink('uploads/picture/dosen/' . $picture);
            }
        } else if ($picture !== 'cewek.jpeg') {
            if ($picture !== 'cowok.jpeg') {
                unlink('uploads/picture/dosen/' . $picture);
            }
        }
        $dosen->delete($id);
        return redirect('admin/dosen');
    }
}

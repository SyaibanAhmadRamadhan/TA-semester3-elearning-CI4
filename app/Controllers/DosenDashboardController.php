<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarKelasModel;
use App\Models\JurusanModel;
use App\Models\MatakuliahModel;
use App\Models\RuangModel;

class DosenDashboardController extends BaseController
{
    public function index()
    {
        return view('dosen/index_dosen', [
            "title" => "dosen"
        ]);
    }
    public function jadwalDosen()
    {
        $matkul = new MatakuliahModel();
        $jurusan = new JurusanModel();
        $ruangan = new RuangModel();
        $daftarKelas = new DaftarKelasModel();

        $dataMatkul = $matkul->where('nip_dosen', session()->get('nip'))->findAll();

        if ($dataMatkul) {
            foreach ($dataMatkul as $x) {
                $dataJurusan[] = $jurusan->where('kode', $x['kode_jurusan'])->findAll();
                $dataRuangan[] = $ruangan->where('id', $x['no_ruang'])->findAll();
                $dataDaftarKelas[] = $daftarKelas->where('id', $x['id_daftar_kelas'])->findAll();
            }
        } else {
            $dataJurusan[] = '';
            $dataRuangan[] = '';
            $dataDaftarKelas[] = '';
        }

        return view('dosen/jadwal_kuliah_dosen', [
            "title" => "jadwalDosen",
            "matkul" => $dataMatkul,
            "jurusan" => $dataJurusan,
            "ruangan" => $dataRuangan,
            "daftarKelas" => $dataDaftarKelas,
        ]);
    }

    public function ruangKelas($id)
    {
        return view('dosen/kelas_dosen', [
            "title" => "kelasDosen",
        ]);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AbsensiDosenModel;
use App\Models\AbsensiMahasiswaModel;
use App\Models\DaftarKelasModel;
use App\Models\DosenModel;
use App\Models\JurusanModel;
use App\Models\MatakuliahMahasiswaModel;
use App\Models\MatakuliahModel;
use App\Models\RuangModel;

class MahasiswaDashboardController extends BaseController
{
    public function index()
    {
        $kelas = new DaftarKelasModel();
        $dataKelas = $kelas->where('id', session()->get('id_kelas'))->first();
        return view('mahasiswa/index_mahasiswa', [
            "title" => "mahasiswa",
            "kelas" => $dataKelas
        ]);
    }

    public function jadwalMahasiswa()
    {
        $matkul = new MatakuliahModel();
        $jurusan = new JurusanModel();
        $ruangan = new RuangModel();
        $daftarKelas = new DaftarKelasModel();
        $matkulMhs = new MatakuliahMahasiswaModel();
        $dosen = new DosenModel();

        $dataMatkulMhs = $matkulMhs->where(['nim_mahasiswa' => session()->get('nim'), 'keterangan' => 'berlangsung'])->findAll();

        if ($dataMatkulMhs) {
            foreach ($dataMatkulMhs as $x) {
                $dataMatkul[] = $matkul->where('kode_matkul', $x['kode_matkul'])->findAll();
                $dataMatkul1[] = $matkul->where('kode_matkul', $x['kode_matkul'])->findAll();
            }
            foreach ($dataMatkul1 as $x) {
                $dataJurusan[] = $jurusan->where('kode', $x[0]['kode_jurusan'])->findAll();
                $dataRuangan[] = $ruangan->where('id', $x[0]['no_ruang'])->findAll();
                $dataDaftarKelas[] = $daftarKelas->where('id', $x[0]['id_daftar_kelas'])->findAll();
                $kodeDosen[] = $dosen->where('nip', $x[0]['nip_dosen'])->findAll();
            }
        } else {
            $dataMatkul[] = '';
            $dataMatkul1[] = '';
        }

        return view('mahasiswa/jadwal_kuliah_mahasiswa', [
            "title" => "jadwalMahasiswa",
            "matkul" => $dataMatkul,
            "jurusan" => $dataJurusan,
            "ruangan" => $dataRuangan,
            "daftarKelas" => $dataDaftarKelas,
            "dosen" => $kodeDosen
        ]);
    }

    public function ruangKelas($id)
    {
        // $absenDosen = new AbsensiDosenModel();
        // $absenMhs = new AbsensiMahasiswaModel();
        // $matkul = new MatakuliahModel();

        // $dataAbsenMhs = $absenMhs->where(['nim_mahasiswa' => session()->get('nim'), 'kode_matkul' => $id])->findAll();
        // $dataDosen = $absenDosen->where(['kode_matkul' => $id, 'keterangan' => 'berlangsung'])->first();
        // // print_r($dataDosen['id']);
        // // die;
        // if ($dataDosen) {
        //     if ($dataDosen['status'] != 'tidak hadir') {
        //         $absenMhs->insert([
        //             'nip_dosen' => $dataDosen['nip_dosen'],
        //             'kode_matkul' => $dataDosen['kode_matkul'],
        //             'absen_dosen_id' => $dataDosen['id'],
        //             'status' => 'tidak hadir',
        //             'keterangan' => 'berlangsung',
        //             'tanggal_masuk' => date('Y-m-d'),
        //             'pertemuan' => 'pertemuan ke - ' . count($dataAbsenMhs) + 1,
        //             'nim_mahasiswa' => session()->get('nim'),
        //         ]);
        //     } else {
        //     }
        // }

        return redirect()->to('/mahasiswa/jadwalMahasiswa/' . $id . '/kelas');
    }

    public function ruangKelasView($id)
    {
        $absenDosen = new AbsensiDosenModel();
        $absenMhs = new AbsensiMahasiswaModel();
        $matkul = new MatakuliahModel();

        $dataMatkul = $matkul->where('kode_matkul', $id)->first();
        if ($absenMhs->where(['kode_matkul' => $id, 'keterangan' => 'berlangsung'])->first()) {
            $dataMatkulHadir = $absenMhs->where(['kode_matkul' => $id, 'keterangan' => 'berlangsung', 'nim_mahasiswa' => session()->get('nim')])->first();
        } else {
            $dataMatkulHadir = ['status' => 'tidak hadir'];
        }
        if ($absenDosen->where(['kode_matkul' => $dataMatkul['kode_matkul'], 'keterangan' => 'berlangsung'])->first()) {
            $dataAbsenDosen = $absenDosen->where(['kode_matkul' => $dataMatkul['kode_matkul'], 'keterangan' => 'berlangsung'])->first();
        } else {
            $dataAbsenDosen = ['status' => 'tidak hadir'];
        }
        $dataAbsenMhs = $absenMhs->where(['kode_matkul' => $dataMatkul['kode_matkul'], 'nim_mahasiswa' => session()->get('nim')])->findAll();
        date_default_timezone_set('Asia/Jakarta');

        return view('mahasiswa/kelas_mahasiswa', [
            "title" => "kelasMahasiswa",
            'absen' => $dataAbsenMhs,
            'absenDosen' => $dataAbsenDosen,
            'matkul' => $dataMatkul,
            'matkulHadir' => $dataMatkulHadir
        ]);
    }

    public function absensiMahasiswa()
    {
        $absen = new AbsensiMahasiswaModel();
        date_default_timezone_set('Asia/Jakarta');
        $absen->set([
            'status' => 'hadir',
            'waktu_masuk' => date('G:i')
        ]);
        $absen->where('keterangan', 'berlangsung');
        $absen->update();
        return redirect()->back();
    }
}

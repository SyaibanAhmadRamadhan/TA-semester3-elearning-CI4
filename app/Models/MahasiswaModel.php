<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{

    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'nim';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'name', 'alamat', 'tgl_lahir', 'email', 'NISN', 'NPSN', 'gender', 'wali', 'picture', 'no_telepon', 'tahun', 'kode_jurusan', 'nim', 'kelas', 'semester'
    ];
    protected $useTimestamps = true;

    public function addres($id)
    {
        return $this->db->table('addres')
            ->join('mahasiswa', 'addres.nim_mahasiswa=mahasiswa.nim')
            ->join('wilayah_provinsi', 'addres.id_provinsi=wilayah_provinsi.id')
            ->join('wilayah_kabupaten', 'addres.id_kabupaten=wilayah_kabupaten.id')
            ->join('wilayah_kecamatan', 'addres.id_kecamatan=wilayah_kecamatan.id')
            ->join('wilayah_desa', 'addres.id_desa=wilayah_desa.id')
            ->join('jurusan', 'mahasiswa.kode_jurusan=jurusan.kode')
            ->where('nim_mahasiswa', $id)
            ->get()->getResultObject();
    }
}

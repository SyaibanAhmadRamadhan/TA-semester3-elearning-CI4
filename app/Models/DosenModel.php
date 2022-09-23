<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{

    protected $table            = 'dosen';
    protected $primaryKey       = 'nip';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'name', 'tgl_lahir', 'email', 'kode_dosen', 'gender', 'wali', 'picture', 'no_telepon', 'kode_jurusan', 'nip', 'kelas', 'semester', 'asal_universitas', 'gelar'
    ];
    protected $useTimestamps = true;

    public function addres($id)
    {
        return $this->db->table('addres')
            ->join('dosen', 'addres.nip_dosen=dosen.nip')
            ->join('wilayah_provinsi', 'addres.id_provinsi=wilayah_provinsi.id')
            ->join('wilayah_kabupaten', 'addres.id_kabupaten=wilayah_kabupaten.id')
            ->join('wilayah_kecamatan', 'addres.id_kecamatan=wilayah_kecamatan.id')
            ->join('wilayah_desa', 'addres.id_desa=wilayah_desa.id')
            ->join('jurusan', 'dosen.kode_jurusan=jurusan.kode')
            ->where('nip_dosen', $id)
            ->get()->getResultObject();
    }
}

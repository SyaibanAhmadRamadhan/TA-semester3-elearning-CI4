<?php

namespace App\Models;

use CodeIgniter\Model;

class GelarModel extends Model
{

    protected $table            = 'gelar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'id_gelar', 'nip_dosen'
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

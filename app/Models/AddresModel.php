<?php

namespace App\Models;

use CodeIgniter\Model;

class AddresModel extends Model
{
    protected $table            = 'addres';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'id_admin', 'nim_mahasiswa', 'nip_dosen', 'id_desa', 'id_kecamatan', 'id_kabupaten', 'id_provinsi', 'detail_alamat'
    ];

    // Dates
    protected $useTimestamps = true;

    public function admin($id)
    {
        return $this->db->table('addres')
            ->join('admin', 'addres.id_admin=admin.id')
            ->where('id_admin', $id)
            ->get()->getResultObject();
    }
    public function mahasiswa($id)
    {
        return $this->db->table('addres')
            ->join('mahasiswa', 'addres.id_mahasiswa=mahasiswa.id')
            ->where('id_mahasiswa', $id)
            ->get()->getResultObject();
    }
}

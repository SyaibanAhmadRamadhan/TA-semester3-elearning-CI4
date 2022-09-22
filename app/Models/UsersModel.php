<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{

    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'id_admin','nim_mahasiswa','nim_dosen','role','password'
    ];

    // Dates
    protected $useTimestamps = true;

    public function admin($id)
    {
         return $this->db->table('user')
         ->join('admin','user.id_admin=admin.id')
         ->where('id_admin',$id)
         ->get()->getResultObject();
    }
    public function mahasiswa($id)
    {
         return $this->db->table('user')
         ->join('mahasiswa','user.nim_mahasiswa=mahasiswa.nim')
         ->where('nim_mahasiswa',$id)
         ->get()->getResultObject();
    }
}

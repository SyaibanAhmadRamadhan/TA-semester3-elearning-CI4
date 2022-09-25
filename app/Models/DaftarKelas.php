<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarKelas extends Model
{

    protected $table            = 'daftar_kelas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'ruang', 'name_kelas', 'semester'
    ];
    protected $useTimestamps = true;
}

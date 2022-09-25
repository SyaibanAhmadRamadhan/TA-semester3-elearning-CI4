<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{

    protected $table            = 'kelas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'id_kelas', 'nip_dosen'
    ];
    protected $useTimestamps = true;
}

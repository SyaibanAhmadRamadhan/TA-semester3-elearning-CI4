<?php

namespace App\Models;

use CodeIgniter\Model;

class SemesterModel extends Model
{
    protected $table            = 'semester';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'keterangan', 'semester', 'nim_mahasiswa'
    ];
    protected $useTimestamps = true;
}

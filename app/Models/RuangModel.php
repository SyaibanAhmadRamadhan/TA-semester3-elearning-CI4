<?php

namespace App\Models;

use CodeIgniter\Model;

class RuangModel extends Model
{
    protected $table            = 'ruang';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'lantai', 'no_ruang'
    ];
    protected $useTimestamps = true;
}

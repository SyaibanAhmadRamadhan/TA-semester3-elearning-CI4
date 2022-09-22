<?php

namespace App\Models;

use CodeIgniter\Model;

class JurusanModel extends Model
{
    protected $table            = 'jurusan';
    protected $primaryKey       = 'kode';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'kode','name_jurusan'
    ];
    protected $useTimestamps = true;
}

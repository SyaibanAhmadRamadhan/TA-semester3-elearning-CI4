<?php

namespace App\Models;

use CodeIgniter\Model;

class MatakuliahMahasiswaModel extends Model
{

    protected $table            = 'matkul_mahasiswa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'nim_mahasiswa', 'kode_matkul', 'keterangan'
    ];
    protected $useTimestamps = true;
}

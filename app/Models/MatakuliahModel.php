<?php

namespace App\Models;

use CodeIgniter\Model;

class MatakuliahModel extends Model
{

    protected $table            = 'mata_kuliah';
    protected $primaryKey       = 'kode_matkul';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'kode_matkul', 'name_matkul', 'semester', 'sks', 'no_ruang', 'kode_jurusan', 'nip_dosen', 'id_daftar_kelas', 'hari', 'masuk', 'selesai', 'materi'
    ];
    protected $useTimestamps = true;
}

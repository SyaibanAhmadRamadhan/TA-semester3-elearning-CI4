<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiDosenModel extends Model
{

    protected $table            = 'absensi_dosen';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'nip_dosen', 'kode_matkul', 'rangkuman', 'status', 'pertemuan', 'tanggal_masuk', 'waktu_masuk', 'keterangan'
    ];
    protected $useTimestamps = true;
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiMahasiswaModel extends Model
{

    protected $table            = 'absensi_mahasiswa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'nip_dosen', 'nim_mahasiswa', 'kode_matkul', 'status', 'pertemuan', 'tanggal_masuk', 'waktu_masuk', 'keterangan', 'absen_dosen_id'
    ];
    protected $useTimestamps = true;
}

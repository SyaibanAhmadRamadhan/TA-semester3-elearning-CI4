<?php

namespace App\Models;

use CodeIgniter\Model;

class Sekolah extends Model{

	protected $table = 'sekolah';

	protected $primaryKey = 'id';

	protected $allowedFields = ['npsn', 'propinsi','kabupaten_kota','kecamatan','sekolah','alamat_jalan','status','bentuk','lintang','bujur'];

}

?>
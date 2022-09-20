<?php

namespace App\Models;

use CodeIgniter\Model;

class DesaModel extends Model{

	protected $table = 'wilayah_desa';

	protected $primaryKey = 'id';

	protected $allowedFields = ['kecamatan_id','nama'];

}

?>
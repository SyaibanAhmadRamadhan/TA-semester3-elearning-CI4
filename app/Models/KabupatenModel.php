<?php

namespace App\Models;

use CodeIgniter\Model;

class KabupatenModel extends Model{

	protected $table = 'wilayah_kabupaten';

	protected $primaryKey = 'id';

	protected $allowedFields = ['provinsi_id', 'nama'];

}

?>
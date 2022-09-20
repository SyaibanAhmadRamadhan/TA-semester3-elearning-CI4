<?php


namespace App\Models;

use CodeIgniter\Model;

class KecamatanModel extends Model{

	protected $table = 'wilayah_kecamatan';

	protected $primaryKey = 'id';

	protected $allowedFields = ['kabupaten_id', 'nama'];

}

?>
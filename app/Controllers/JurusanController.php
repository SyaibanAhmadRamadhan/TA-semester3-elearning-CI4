<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class JurusanController extends BaseController
{
    public function addJurusan()
    {
        return view('admin/jurusan/add_jurusan');
    }
}

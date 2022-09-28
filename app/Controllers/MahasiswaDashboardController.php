<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MahasiswaDashboardController extends BaseController
{
    public function index()
    {
        return view('dosen/index_mahasiswa', [
            "title" => "mahasiswa"
        ]);
    }
}

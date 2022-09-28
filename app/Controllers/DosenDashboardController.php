<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DosenDashboardController extends BaseController
{
    public function index()
    {
        return view('dosen/index_dosen', [
            "title" => "dosen"
        ]);
    }
    public function jadwalDosen()
    {
        print_r(session()->get());
        die;
        return view('dosen/jadwal_kuliah_dosen', [
            "title" => "jadwalDosen"
        ]);
    }
}

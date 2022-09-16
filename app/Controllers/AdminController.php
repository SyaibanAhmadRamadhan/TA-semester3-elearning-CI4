<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        return view('admin/mahasiswa/index_admin',[
            "title" => "admin"
        ]);
    }
}

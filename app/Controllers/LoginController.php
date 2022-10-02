<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login', [
            "title" => "login",
        ]);
    }

    public function login()
    {
        $user = new UsersModel();

        $nim = $this->request->getPost('nim');
        $password = $this->request->getPost('password');

        $mahasiswa = $user->mahasiswa($nim);
        $admin = $user->admin($nim);
        $dosen = $user->dosen($nim);
        if ($admin) {
            if (password_verify($password, $admin[0]->password)) {
                session()->set([
                    'name' => $admin[0]->email,
                    'login' => true
                ]);
                // print_r(session()->get());
                // die;
                return redirect()->to(base_url('admin'));
            } else {
                session()->setFlashdata('error', 'admin');
                return redirect()->back();
            }
        } elseif ($mahasiswa) {
            if (password_verify($password, $mahasiswa[0]->password)) {
                session()->set([
                    'name' => $mahasiswa[0]->name,
                    'email' => $mahasiswa[0]->email,
                    'kode_jurusan' => $mahasiswa[0]->kode_jurusan,
                    'id_kelas' => $mahasiswa[0]->id_kelas,
                    'picture' => $mahasiswa[0]->picture,
                    'nim' => $mahasiswa[0]->nim,
                    'login_mahasiswa' => true
                ]);
                return redirect()->to(base_url('mahasiswa'));
            } else {
                session()->setFlashdata('error', 'mahasiswa');
                return redirect()->back();
            }
        } elseif ($dosen) {
            if (password_verify($password, $dosen[0]->password)) {
                session()->set([
                    'name' => $dosen[0]->name,
                    'nip' => $dosen[0]->nip,
                    'kode_dosen' => $dosen[0]->kode_dosen,
                    'email' => $dosen[0]->email,
                    'kode_jurusan' => $dosen[0]->kode_jurusan,
                    'picture' => $dosen[0]->picture,
                    'login_dosen' => true
                ]);
                return redirect()->to(base_url('dosen'));
            } else {
                session()->setFlashdata('error', 'dosen');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'nim atau password salah');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

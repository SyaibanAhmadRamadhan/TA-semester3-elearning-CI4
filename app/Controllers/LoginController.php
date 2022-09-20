<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login',[
            "title" => "login",
        ]);
    }

    public function login(){
        $user = new UsersModel();

        $nim = $this->request->getPost('nim');
        $password = $this->request->getPost('password');

        $mahasiswa = $user->mahasiswa($nim);
        $admin = $user->admin($nim);

        if($admin){
            if(password_verify($password, $admin[0]->password)){
                session()->set([
                    'name'=>$admin[0]->email,
                    'login' => true
                ]);
                return redirect()->to(base_url('admin'));
            }else{
                session()->setFlashdata('error','admin');
                return redirect()->back();
            }
        }elseif ($mahasiswa) {
            if(password_verify($password, $mahasiswa[0]->password)){
                session()->set([
                    'name'=>$mahasiswa[0]->name,
                    'login' => true
                ]);
                return redirect()->to(base_url('admin'));
            }else{
                session()->setFlashdata('error','mahasiswa');
                return redirect()->back();
            }
        }
        else{
            session()->setFlashdata('error','nim atau password salah');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

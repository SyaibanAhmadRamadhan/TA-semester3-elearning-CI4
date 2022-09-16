<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class MahasiswaController extends BaseController
{

    // mahasiswa
    public function addMahasiswa(){
        $validet = \Config\Services::validation();

        $validet->setRules([
            'name'=>'required',
            'tgl_lahir'=>'required',
            'alamat'=>'required',
            'role'=>'required',
        ]);

        $isValidate = $validet->withRequest($this->request)->run();

        if ($isValidate) {
            $mahasiswa = new MahasiswaModel();
            $mahasiswa->insert([
                'nama'=> $this->request->getPost('name'),
                'tgl_lahir'=> $this->request->getPost('tgl_lahir'),
                'alamat'=> $this->request->getPost('alamat'),
                'role'=> $this->request->getPost('role'),
            ]);
            return redirect('admin/mahasiswa');
        }

        return view('admin/mahasiswa/add_mahasiswa',[
            "title" => "addMahasiswa"
        ]);
    }

    public function dataMahasiswa() {
        $mahasiswa = new MahasiswaModel();

        $dataMahasiswa = $mahasiswa->where('role', 'mahasiswa')->findAll();
        return view('admin/mahasiswa/data_mahasiswa',[
            "title" => "dataMahasiswa",
            "mahasiswa"=>$dataMahasiswa
        ]);
    }

    public function detailMahasiswa($id){
        $mahasiswa = new MahasiswaModel();
        $detail = $mahasiswa->where('id',$id)->first();
        if(!$detail){
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/mahasiswa/detail_mahasiswa',[
            "data" => $detail
        ]);
    }

    public function editMahasiswa($id){
        $mahasiswa = new MahasiswaModel();
        $dataMahasiswa = $mahasiswa->where('id',$id)->first();
        if (!$dataMahasiswa){
            throw PageNotFoundException::forPageNotFound();
        }

        $validet = \Config\Services::validation();
        $validet->setRules([
            'name'=>'required',
            'tgl_lahir'=>'required',
            'alamat'=>'required',
            'role'=>'required',
        ]);
        $isValidet = $validet->withRequest($this->request)->run();

        if($isValidet){
            $mahasiswa->update($id,[
                'nama'=> $this->request->getPost('name'),
                'tgl_lahir'=> $this->request->getPost('tgl_lahir'),
                'alamat'=> $this->request->getPost('alamat'),
                'role'=> $this->request->getPost('role'),
            ]);
            return redirect('admin/mahasiswa');
        };
        return view('admin/mahasiswa/edit_mahasiswa',[
            "title" => "editMahasiswa",
            "data" => $dataMahasiswa
        ]);
    }
    public function deleteMahasiswa($id){
        $mahasiswa = new MahasiswaModel();
        $mahasiswa->delete($id);
        return redirect('admin/mahasiswa');
    }
    // end mahasiswa
}

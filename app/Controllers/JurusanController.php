<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JurusanModel;

class JurusanController extends BaseController
{
    public function addJurusan()
    {
        $isValidate = $this->validate([
            'name' => 'required',
        ]);
        if($isValidate){
            $jurusan = new JurusanModel();
            $jurusan->insert([
                'name_jurusan'=>$this->request->getPost('name'),
                'kode'=>$this->request->getPost('kode'),
            ]);
            return redirect('admin/jurusan');
        }
        return view('admin/jurusan/add_jurusan',[
            'title'=> 'addJurusan'
        ]);
    }

    public function dataJurusan()
    {
        $jurusan = new JurusanModel();
        return view('admin/jurusan/data_jurusan',[
            'jurusan'=>$jurusan->findAll(),
            'title'=>'dataJurusan'
        ]);
    }
    
    public function editJurusan($id)
    {
        $isValidate = $this->validate([
            'name' => 'required',
        ]);
        if($isValidate){
            $jurusan = new JurusanModel();
            $jurusan->update($id,[
                'name_jurusan'=>$this->request->getPost('name'),
                'kode'=>$this->request->getPost('kode'),
            ]);
            return redirect('admin/jurusan');
        }
        
        $jurusanView = new JurusanModel();
        $dataJurusanView =$jurusanView->where('kode',$id)->first();
        return view('admin/jurusan/edit_jurusan',[
            'title'=> 'editJurusan',
            'data'=>$dataJurusanView
        ]);
    }

    public function deleteJurusan($id){
        $jurusan = new JurusanModel();
        $dataJurusan = $jurusan->where('kode',$id)->find();
        if(!$dataJurusan){
            throw PageNotFoundException::forPageNotFound();
        }
        $jurusan->delete($id);
        return redirect('admin/jurusan');
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AddresModel;
use App\Models\MahasiswaModel;
use App\Models\ProvinsiModel;
use App\Models\UsersModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class MahasiswaController extends BaseController
{
    // mahasiswa
    public function dataMahasiswa() {
        $mahasiswa = new MahasiswaModel();
        $dataMahasiswa = $mahasiswa->findAll();
        return view('admin/mahasiswa/data_mahasiswa',[
            "title" => "dataMahasiswa",
            "mahasiswa"=>$dataMahasiswa,
        ]);
    }


    public function addMahasiswa(){

        $isValidate = $this->validate([
            'name'=>'required',
            'tgl_lahir'=>'required',
        ]);

        if ($isValidate) {
            $mahasiswa = new MahasiswaModel();

            if ($mahasiswa->where('email',$this->request->getPost('email'))->first()){
                session()->setFlashdata('error','email sudah terdaftar');
                return redirect()->withInput()->back();
            }else if ($mahasiswa->where('NISN',$this->request->getPost('nisn'))->first()){
                // session()->setFlashdata('error','nisn sudah terdaftar');
                return redirect()->back()->withInput()->with('erros',$this->validator->getErrors());
            }else if ($mahasiswa->where('no_telepon',$this->request->getPost('no_telepon'))->first()){
                session()->setFlashdata('error','nomer telepon sudah terdaftar');
                return redirect()->withInput()->back();
            }

            $user = new UsersModel();
            $addres = new AddresModel();
            if ($this->request->getPost('action') == "false"){
                $datapicture = $this->request->getFile('picture');
                $fileName = $datapicture->getRandomName();
                $id = $mahasiswa->insert([
                    'name'=> $this->request->getPost('name'),
                    'tgl_lahir'=> $this->request->getPost('tgl_lahir'),
                    'email'=> $this->request->getPost('email'),
                    'NISN'=> $this->request->getPost('nisn'),
                    'NPSN'=> $this->request->getPost('npsn'),
                    'gender'=> $this->request->getPost('gender'),
                    'wali'=> $this->request->getPost('wali'),
                    'no_telepon'=> $this->request->getPost('no_telepon'),
                    'picture' => $fileName,
                ]);
                $datapicture->move('uploads/picture/mahasiswa', $fileName);
            }else if ($this->request->getPost('action') == "true"){
                if($this->request->getPost('gender') == 'pria'){
                    $id = $mahasiswa->insert([
                        'name'=> $this->request->getPost('name'),
                        'tgl_lahir'=> $this->request->getPost('tgl_lahir'),
                        'email'=> $this->request->getPost('email'),
                        'NISN'=> $this->request->getPost('nisn'),
                        'NPSN'=> $this->request->getPost('npsn'),
                        'gender'=> $this->request->getPost('gender'),
                        'wali'=> $this->request->getPost('wali'),
                        'no_telepon'=> $this->request->getPost('no_telepon'),
                        'picture' => "cowok.jpeg"
                    ]);
                }elseif($this->request->getPost('gender') == 'wanita'){
                    $id = $mahasiswa->insert([
                        'name'=> $this->request->getPost('name'),
                        'tgl_lahir'=> $this->request->getPost('tgl_lahir'),
                        'email'=> $this->request->getPost('email'),
                        'NISN'=> $this->request->getPost('nisn'),
                        'NPSN'=> $this->request->getPost('npsn'),
                        'gender'=> $this->request->getPost('gender'),
                        'wali'=> $this->request->getPost('wali'),
                        'no_telepon'=> $this->request->getPost('no_telepon'),
                        'picture' => "cewek.jpeg"
                    ]);
                }
            }

            $user->insert([
                'id_mahasiswa' => $id,
                'password'=>password_hash($this->request->getPost('tgl_lahir'),PASSWORD_BCRYPT),
                'role'=> 'mahasiswa',
            ]);
            $addres->insert([
                'id_mahasiswa'=>$id,
                'id_provinsi'=>$this->request->getPost('provinsi'),
                'id_kabupaten'=>$this->request->getPost('kabupaten'),
                'id_kecamatan'=>$this->request->getPost('kecamatan'),
                'id_desa'=>$this->request->getPost('desa'),
                'detail_alamat'=>$this->request->getPost('alamat'),
            ]);
            return redirect('admin/mahasiswa');
        }
        $prov = new ProvinsiModel();
        $dataProv = $prov->findAll();
        return view('admin/mahasiswa/add_mahasiswa',[
            "title" => "addMahasiswa",
            "provinsi" => $dataProv,
        ]);


    }


    public function detailMahasiswa($id){
        $mahasiswa = new MahasiswaModel();
        $adMhs = $mahasiswa->addres($id);
        $detail = $mahasiswa->where('id',$id)->first();
        if(!$detail){
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/mahasiswa/detail_mahasiswa',[
            "data" => $adMhs[0],
            "title" => 'detailMahasiswa'
        ]);
    }

    public function editMahasiswa($id){
        $mahasiswa = new MahasiswaModel();
        $dataMahasiswa = $mahasiswa->where('id',$id)->first();
        if (!$dataMahasiswa){
            throw PageNotFoundException::forPageNotFound();
        }

        $isValidate = $this->validate([
            'name'=>'required',
            'tgl_lahir'=>'required',
            'alamat'=>'required',
        ]);

         if ($isValidate) {
            $mahasiswa = new MahasiswaModel();
            $user = new UsersModel();
            $idUser = $user->where('id_mahasiswa',$id)->first();

            $addres = new AddresModel();
            $idAddres = $addres->where('id_mahasiswa',$id)->first();
            if ($this->request->getPost('action') == "false"){
                $datapicture = $this->request->getFile('picture');
                $fileName = $datapicture->getRandomName();
                $mahasiswa->update($id,[
                    'name'=> $this->request->getPost('name'),
                    'tgl_lahir'=> $this->request->getPost('tgl_lahir'),
                    'email'=> $this->request->getPost('email'),
                    'NISN'=> $this->request->getPost('nisn'),
                    'NPSN'=> $this->request->getPost('npsn'),
                    'gender'=> $this->request->getPost('gender'),
                    'wali'=> $this->request->getPost('wali'),
                    'no_telepon'=> $this->request->getPost('no_telepon'),
                    'picture' => $fileName,
                ]);
                $datapicture->move('uploads/picture/mahasiswa', $fileName);
                $picture = $this->request->getPost('oldPic');
                if ($picture !== 'cowok.jpeg'){
                    if ($picture !== 'cewek.jpeg') {
                        unlink( 'uploads/picture/mahasiswa/'.$picture);
                    }
                }
                else if ($picture !== 'cewek.jpeg'){
                    if ($picture !== 'cowok.jpeg') {
                        unlink( 'uploads/picture/mahasiswa/'.$picture);
                    }
                }
            }else if ($this->request->getPost('action') == "true"){
                if ($this->request->getPost('hapusPic') != 'true'){
                    $id = $mahasiswa->update($id,[
                        'name'=> $this->request->getPost('name'),
                        'tgl_lahir'=> $this->request->getPost('tgl_lahir'),
                        'email'=> $this->request->getPost('email'),
                        'NISN'=> $this->request->getPost('nisn'),
                        'NPSN'=> $this->request->getPost('npsn'),
                        'gender'=> $this->request->getPost('gender'),
                        'wali'=> $this->request->getPost('wali'),
                        'no_telepon'=> $this->request->getPost('no_telepon'),
                        'picture' => $this->request->getPost('oldPic')
                    ]);
                }else {
                    if($this->request->getPost('gender') == 'pria'){
                        $id = $mahasiswa->update($id,[
                            'name'=> $this->request->getPost('name'),
                            'tgl_lahir'=> $this->request->getPost('tgl_lahir'),
                            'email'=> $this->request->getPost('email'),
                            'NISN'=> $this->request->getPost('nisn'),
                            'NPSN'=> $this->request->getPost('npsn'),
                            'gender'=> $this->request->getPost('gender'),
                            'wali'=> $this->request->getPost('wali'),
                            'no_telepon'=> $this->request->getPost('no_telepon'),
                            'picture' => "cowok.jpeg"
                        ]);
                    }elseif($this->request->getPost('gender') == 'wanita'){
                        $id = $mahasiswa->update($id,[
                            'name'=> $this->request->getPost('name'),
                            'tgl_lahir'=> $this->request->getPost('tgl_lahir'),
                            'email'=> $this->request->getPost('email'),
                            'NISN'=> $this->request->getPost('nisn'),
                            'NPSN'=> $this->request->getPost('npsn'),
                            'gender'=> $this->request->getPost('gender'),
                            'wali'=> $this->request->getPost('wali'),
                            'no_telepon'=> $this->request->getPost('no_telepon'),
                            'picture' => "cewek.jpeg"
                        ]);
                    }

                    $picture = $this->request->getPost('oldPic');
                    if ($picture !== 'cowok.jpeg'){
                        if ($picture !== 'cewek.jpeg') {
                            unlink( 'uploads/picture/mahasiswa/'.$picture);
                        }
                    }
                    else if ($picture !== 'cewek.jpeg'){
                        if ($picture !== 'cowok.jpeg') {
                            unlink( 'uploads/picture/mahasiswa/'.$picture);
                        }
                    }
                }

            }
            $user->where('id_mahasiswa',$id)->update($idUser['id'],[
                'id_mahasiswa' => $id,
                'password'=>password_hash($this->request->getPost('tgl_lahir'),PASSWORD_BCRYPT),
                'role'=> 'mahasiswa',
            ]);
            $addres->where('id_mahasiswa',$id)->update($idAddres,[
                'id_mahasiswa'=>$id,
                'id_provinsi'=>$this->request->getPost('provinsi'),
                'id_kabupaten'=>$this->request->getPost('kabupaten'),
                'id_kecamatan'=>$this->request->getPost('kecamatan'),
                'id_desa'=>$this->request->getPost('desa'),
                'detail_alamat'=>$this->request->getPost('alamat'),
            ]);
            return redirect('admin/mahasiswa');
        }

        $prov = new ProvinsiModel();
        $dataProv = $prov->findAll();
        $adMhs = $mahasiswa->addres($id);
        return view('admin/mahasiswa/edit_mahasiswa',[
            "title" => "editMahasiswa",
            "data" => $adMhs[0],
            "provinsi" => $dataProv
        ]);
    }

    public function deleteMahasiswa($id){
        $mahasiswa = new MahasiswaModel();

        $dataMahasiswa = $mahasiswa->where('id',$id)->first();
        $picture = $dataMahasiswa['picture'];
        if ($picture !== 'cowok.jpeg'){
            if ($picture !== 'cewek.jpeg') {
                unlink( 'uploads/picture/mahasiswa/'.$picture);
            }
        }
        else if ($picture !== 'cewek.jpeg'){
            if ($picture !== 'cowok.jpeg') {
                unlink( 'uploads/picture/mahasiswa/'.$picture);
            }
        }
        $mahasiswa->delete($id);
        return redirect('admin/mahasiswa');
    }
    // end mahasiswa


}

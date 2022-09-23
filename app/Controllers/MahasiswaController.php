<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Semester;
use App\Models\AddresModel;
use App\Models\JurusanModel;
use App\Models\MahasiswaModel;
use App\Models\ProvinsiModel;
use App\Models\Sekolah;
use App\Models\SemesterModel;
use App\Models\UsersModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class MahasiswaController extends BaseController
{
    // mahasiswa
    public function dataMahasiswa()
    {
        $mahasiswa = new MahasiswaModel();
        $dataMahasiswa = $mahasiswa->findAll();
        return view('admin/mahasiswa/data_mahasiswa', [
            "title" => "dataMahasiswa",
            "mahasiswa" => $dataMahasiswa,
        ]);
    }

    public function addMahasiswa()
    {

        $isValidate = $this->validate([
            'name' => 'required',
            'tgl_lahir' => 'required',
        ]);

        if ($isValidate) {
            $mahasiswa = new MahasiswaModel();

            // nim tahun
            $tahun = date("Y");
            $tahunNim = substr($tahun, 2);

            // count mhs
            $data = $mahasiswa->findAll();
            $totalMhsNim = sprintf("%03s", count($data) + 1);

            // jurusan
            $jurusan = $this->request->getPost('jurusan');

            // angkatan
            $angkatanNim = sprintf("%02s", date("Y") - 2021);

            $nim = $angkatanNim . $jurusan . $tahunNim . $totalMhsNim;


            if ($mahasiswa->where('email', $this->request->getPost('email'))->first()) {
                session()->setFlashdata('error', 'email sudah terdaftar');
                return redirect()->withInput()->back();
            } else if ($mahasiswa->where('NISN', $this->request->getPost('nisn'))->first()) {
                // session()->setFlashdata('error','nisn sudah terdaftar');
                return redirect()->back()->withInput()->with('erros', $this->validator->getErrors());
            } else if ($mahasiswa->where('no_telepon', $this->request->getPost('no_telepon'))->first()) {
                session()->setFlashdata('error', 'nomer telepon sudah terdaftar');
                return redirect()->withInput()->back();
            }


            $user = new UsersModel();
            $addres = new AddresModel();
            $semester = new SemesterModel();
            if ($this->request->getPost('action') == "false") {
                $datapicture = $this->request->getFile('picture');
                $fileName = $datapicture->getRandomName();
                $mahasiswa->insert([
                    'name' => $this->request->getPost('name'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'email' => $this->request->getPost('email'),
                    'NISN' => $this->request->getPost('nisn'),
                    'NPSN' => $this->request->getPost('npsn'),
                    'gender' => $this->request->getPost('gender'),
                    'wali' => $this->request->getPost('wali'),
                    'no_telepon' => $this->request->getPost('no_telepon'),
                    'picture' => $fileName,
                    'kode_jurusan' => $this->request->getPost('jurusan'),
                    'kelas' => $this->request->getPost('kelas'),
                    'tahun' => date("Y"),
                    'nim' => $nim
                ]);
                $datapicture->move('uploads/picture/mahasiswa', $fileName);
            } else if ($this->request->getPost('action') == "true") {
                if ($this->request->getPost('gender') == 'pria') {
                    $mahasiswa->insert([
                        'name' => $this->request->getPost('name'),
                        'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                        'email' => $this->request->getPost('email'),
                        'NISN' => $this->request->getPost('nisn'),
                        'NPSN' => $this->request->getPost('npsn'),
                        'gender' => $this->request->getPost('gender'),
                        'wali' => $this->request->getPost('wali'),
                        'no_telepon' => $this->request->getPost('no_telepon'),
                        'kelas' => $this->request->getPost('kelas'),
                        'picture' => "cowok.jpeg",
                        'kode_jurusan' => $this->request->getPost('jurusan'),
                        'tahun' => date("Y"),
                        'nim' => $nim
                    ]);
                } elseif ($this->request->getPost('gender') == 'wanita') {
                    $mahasiswa->insert([
                        'name' => $this->request->getPost('name'),
                        'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                        'email' => $this->request->getPost('email'),
                        'NISN' => $this->request->getPost('nisn'),
                        'kelas' => $this->request->getPost('kelas'),
                        'NPSN' => $this->request->getPost('npsn'),
                        'gender' => $this->request->getPost('gender'),
                        'wali' => $this->request->getPost('wali'),
                        'no_telepon' => $this->request->getPost('no_telepon'),
                        'picture' => "cewek.jpeg",
                        'kode_jurusan' => $this->request->getPost('jurusan'),
                        'tahun' => date("Y"),
                        'nim' => $nim
                    ]);
                }
            }

            $user->insert([
                'nim_mahasiswa' => $nim,
                'password' => password_hash($this->request->getPost('tgl_lahir'), PASSWORD_BCRYPT),
                'role' => 'mahasiswa',
            ]);

            $semester->insert([
                'nim_mahasiswa' => $nim,
                'keterangan' => 'berlangsung',
                'semester' => 'semester1',
                'role' => 'mahasiswa',
            ]);

            $addres->insert([
                'nim_mahasiswa' => $nim,
                'id_provinsi' => $this->request->getPost('provinsi'),
                'id_kabupaten' => $this->request->getPost('kabupaten'),
                'id_kecamatan' => $this->request->getPost('kecamatan'),
                'id_desa' => $this->request->getPost('desa'),
                'detail_alamat' => $this->request->getPost('alamat'),
            ]);
            return redirect('admin/mahasiswa');
        }
        $jurusan = new JurusanModel();
        $prov = new ProvinsiModel();
        $dataProv = $prov->findAll();
        return view('admin/mahasiswa/add_mahasiswa', [
            "title" => "addMahasiswa",
            "provinsi" => $dataProv,
            "jurusan" => $jurusan->findAll(),
        ]);
    }


    public function detailMahasiswa($id)
    {
        $mahasiswa = new MahasiswaModel();
        $sekolah = new Sekolah();
        $semester = new SemesterModel();

        $adMhs = $mahasiswa->addres($id);
        $detail = $mahasiswa->where('nim', $id)->first();
        $dataSekolah = $sekolah->where('npsn', $adMhs[0]->NPSN)->first();
        $dataSemester = $semester->where(['nim_mahasiswa' => $adMhs[0]->nim, 'keterangan' => 'berlangsung'])->first();
        if (!$detail) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/mahasiswa/detail_mahasiswa', [
            "data" => $adMhs[0],
            "title" => 'detailMahasiswa',
            "nim" => $id,
            "dataSekolah" => $dataSekolah,
            "semester" => $dataSemester
        ]);
    }

    public function editMahasiswa($id)
    {
        $mahasiswa = new MahasiswaModel();
        $dataMahasiswa = $mahasiswa->where('nim', $id)->first();
        if (!$dataMahasiswa) {
            throw PageNotFoundException::forPageNotFound();
        }

        $isValidate = $this->validate([
            'name' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
        ]);

        if ($isValidate) {
            $mahasiswa = new MahasiswaModel();
            // nim tahun
            $tahun = date("Y");
            $tahunNim = substr($tahun, 2);

            // count mhs
            $totalMhsNim = substr($dataMahasiswa['nim'], 7);

            // jurusan
            $jurusan = $this->request->getPost('jurusan');

            // angkatan
            $angkatanNim = sprintf("%02s", date("Y") - 2021);

            $nim = $angkatanNim . $jurusan . $tahunNim . $totalMhsNim;

            $mahasiswa = new MahasiswaModel();
            $user = new UsersModel();
            $idUser = $user->where('nim_mahasiswa', $id)->first();

            $addres = new AddresModel();
            $idAddres = $addres->where('nim_mahasiswa', $id)->first();
            if ($this->request->getPost('action') == "false") {
                $datapicture = $this->request->getFile('picture');
                $fileName = $datapicture->getRandomName();
                $mahasiswa->update($id, [
                    'name' => $this->request->getPost('name'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'email' => $this->request->getPost('email'),
                    'NISN' => $this->request->getPost('nisn'),
                    'NPSN' => $this->request->getPost('npsn'),
                    'gender' => $this->request->getPost('gender'),
                    'wali' => $this->request->getPost('wali'),
                    'no_telepon' => $this->request->getPost('no_telepon'),
                    'picture' => $fileName,
                    'kode_jurusan' => $this->request->getPost('jurusan'),
                    'kelas' => $this->request->getPost('kelas'),

                    'tahun' => date("Y"),
                    'nim' => $nim
                ]);
                $datapicture->move('uploads/picture/mahasiswa', $fileName);
                $picture = $this->request->getPost('oldPic');
                if ($picture !== 'cowok.jpeg') {
                    if ($picture !== 'cewek.jpeg') {
                        unlink('uploads/picture/mahasiswa/' . $picture);
                    }
                } else if ($picture !== 'cewek.jpeg') {
                    if ($picture !== 'cowok.jpeg') {
                        unlink('uploads/picture/mahasiswa/' . $picture);
                    }
                }
            } else if ($this->request->getPost('action') == "true") {
                if ($this->request->getPost('hapusPic') != 'true') {
                    $mahasiswa->update($id, [
                        'name' => $this->request->getPost('name'),
                        'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                        'email' => $this->request->getPost('email'),
                        'NISN' => $this->request->getPost('nisn'),
                        'NPSN' => $this->request->getPost('npsn'),
                        'gender' => $this->request->getPost('gender'),
                        'wali' => $this->request->getPost('wali'),
                        'no_telepon' => $this->request->getPost('no_telepon'),
                        'kelas' => $this->request->getPost('kelas'),

                        'picture' => $this->request->getPost('oldPic'),
                        'kode_jurusan' => $this->request->getPost('jurusan'),
                        'tahun' => date("Y"),
                        'nim' => $nim
                    ]);
                } else {
                    if ($this->request->getPost('gender') == 'pria') {
                        $mahasiswa->update($id, [
                            'name' => $this->request->getPost('name'),
                            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                            'email' => $this->request->getPost('email'),
                            'NISN' => $this->request->getPost('nisn'),
                            'NPSN' => $this->request->getPost('npsn'),
                            'gender' => $this->request->getPost('gender'),
                            'wali' => $this->request->getPost('wali'),
                            'kelas' => $this->request->getPost('kelas'),

                            'no_telepon' => $this->request->getPost('no_telepon'),
                            'picture' => "cowok.jpeg",
                            'kode_jurusan' => $this->request->getPost('jurusan'),
                            'tahun' => date("Y"),
                            'nim' => $nim
                        ]);
                    } elseif ($this->request->getPost('gender') == 'wanita') {
                        $mahasiswa->update($id, [
                            'name' => $this->request->getPost('name'),
                            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                            'email' => $this->request->getPost('email'),
                            'NISN' => $this->request->getPost('nisn'),
                            'NPSN' => $this->request->getPost('npsn'),
                            'gender' => $this->request->getPost('gender'),
                            'wali' => $this->request->getPost('wali'),
                            'no_telepon' => $this->request->getPost('no_telepon'),
                            'kelas' => $this->request->getPost('kelas'),

                            'picture' => "cewek.jpeg",
                            'kode_jurusan' => $this->request->getPost('jurusan'),
                            'tahun' => date("Y"),
                            'nim' => $nim
                        ]);
                    }

                    $picture = $this->request->getPost('oldPic');
                    if ($picture !== 'cowok.jpeg') {
                        if ($picture !== 'cewek.jpeg') {
                            unlink('uploads/picture/mahasiswa/' . $picture);
                        }
                    } else if ($picture !== 'cewek.jpeg') {
                        if ($picture !== 'cowok.jpeg') {
                            unlink('uploads/picture/mahasiswa/' . $picture);
                        }
                    }
                }
            }
            $user->where('nim_mahasiswa', $id)->update($idUser['id'], [
                'password' => password_hash($this->request->getPost('tgl_lahir'), PASSWORD_BCRYPT),
                'role' => 'mahasiswa',
            ]);
            $addres->where('nim_mahasiswa', $id)->update($idAddres['id'], [
                'id_provinsi' => $this->request->getPost('provinsi'),
                'id_kabupaten' => $this->request->getPost('kabupaten'),
                'id_kecamatan' => $this->request->getPost('kecamatan'),
                'id_desa' => $this->request->getPost('desa'),
                'detail_alamat' => $this->request->getPost('alamat'),
            ]);
            return redirect('admin/mahasiswa');
        }

        $prov = new ProvinsiModel();
        $dataProv = $prov->findAll();
        $adMhs = $mahasiswa->addres($id);
        $jurusan = new JurusanModel();
        return view('admin/mahasiswa/edit_mahasiswa', [
            "title" => "editMahasiswa",
            "data" => $adMhs[0],
            "provinsi" => $dataProv,
            "jurusan" => $jurusan->findAll(),
        ]);
    }

    public function deleteMahasiswa($id)
    {
        $mahasiswa = new MahasiswaModel();

        $dataMahasiswa = $mahasiswa->where('nim', $id)->first();
        $picture = $dataMahasiswa['picture'];
        if ($picture !== 'cowok.jpeg') {
            if ($picture !== 'cewek.jpeg') {
                unlink('uploads/picture/mahasiswa/' . $picture);
            }
        } else if ($picture !== 'cewek.jpeg') {
            if ($picture !== 'cowok.jpeg') {
                unlink('uploads/picture/mahasiswa/' . $picture);
            }
        }
        $mahasiswa->delete($id);
        return redirect('admin/mahasiswa');
    }

    public function updateSemester()
    {
        $semester = new SemesterModel();
        $data = $semester->select('nim_mahasiswa')->distinct()->where('keterangan', 'berlangsung')->findAll();
        $dataUI = $semester->where('keterangan', 'berlangsung')->findAll();
        if (date("m") < 06) {
            for ($i = 0; $i < count($data); $i++) {
                $semesterData = $dataUI[$i]['semester'];
                $sub = (int)substr($semesterData, 8) + 1;
                $insert = ("semester" . $sub);

                $semester->update($dataUI[$i]['id'], [
                    "keterangan" => "lulus"
                ]);

                if ($insert != 'semester9') {
                    $semester->insert([
                        "semester" => $insert,
                        "nim_mahasiswa" => $dataUI[$i]['nim_mahasiswa'],
                    ]);
                } else {
                }
            }
        } else if (date("m") < 12) {
            for ($i = 0; $i < count($data); $i++) {
                $semesterData = $dataUI[$i]['semester'];
                $sub = (int)substr($semesterData, 8) + 1;
                $insert = ("semester" . $sub);

                $semester->update($dataUI[$i]['id'], [
                    "keterangan" => "lulus"
                ]);

                if ($insert != 'semester9') {
                    $semester->insert([
                        "semester" => $insert,
                        "nim_mahasiswa" => $dataUI[$i]['nim_mahasiswa'],
                    ]);
                } else {
                }
            }
        }

        return redirect('admin/mahasiswa');
    }
    // end mahasiswa


}

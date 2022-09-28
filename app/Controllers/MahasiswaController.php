<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AddresModel;
use App\Models\DaftarKelasModel;
use App\Models\DosenModel;
use App\Models\JurusanModel;
use App\Models\MahasiswaModel;
use App\Models\MatakuliahMahasiswaModel;
use App\Models\MatakuliahModel;
use App\Models\ProvinsiModel;
use App\Models\RuangModel;
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
                    'id_kelas' => $this->request->getPost('kelas'),
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
                        'id_kelas' => $this->request->getPost('kelas'),
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
                        'id_kelas' => $this->request->getPost('kelas'),
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


            $matkul = new MatakuliahModel();
            $dataMatkul = $matkul->where(['kode_jurusan' => $this->request->getPost('jurusan'), 'id_daftar_kelas' => $this->request->getPost('kelas'), 'semester' => 'semester1'])->findAll();

            $matkulMahasiswa = new MatakuliahMahasiswaModel();
            for ($i = 0; $i < count($dataMatkul); $i++) {
                $matkulMahasiswa->insert([
                    'nim_mahasiswa' => $nim,
                    'kode_matkul' => $dataMatkul[$i]['kode_matkul'],
                    'keterangan' => 'berlangsung'
                ]);
            }

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
        $kelas = new DaftarKelasModel();
        return view('admin/mahasiswa/add_mahasiswa', [
            "title" => "addMahasiswa",
            "provinsi" => $dataProv,
            "jurusan" => $jurusan->findAll(),
            "kelas" => $kelas->findAll()
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

        $matkulMahasiswa = new MatakuliahMahasiswaModel();
        $data = $matkulMahasiswa->where(['nim_mahasiswa' => $id, 'keterangan' => 'berlangsung'])->findAll();

        $matkul = new MatakuliahModel();
        foreach ($data as $x) {
            $dataMatkul[] = $matkul->where('kode_matkul', $x['kode_matkul'])->findAll();
        }

        $ruang = new RuangModel();
        $dosen = new DosenModel();
        foreach ($dataMatkul as $x) {
            $dataRuang[] = $ruang->where('id', $x[0]['no_ruang'])->findAll();
            $dataDosen[] = $dosen->where('nip', $x[0]['nip_dosen'])->findAll();
        }

        if (!$detail) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/mahasiswa/detail_mahasiswa', [
            "data" => $adMhs[0],
            "title" => 'detailMahasiswa',
            "nim" => $id,
            "dataSekolah" => $dataSekolah,
            "semester" => $dataSemester,
            "matkul" => $dataMatkul,
            "ruangan" => $dataRuang,
            "dosen" => $dataDosen
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
                    'id_kelas' => $this->request->getPost('kelas'),
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
                        'id_kelas' => $this->request->getPost('kelas'),
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
                            'id_kelas' => $this->request->getPost('kelas'),
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
                            'id_kelas' => $this->request->getPost('kelas'),
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
        $kelas = new DaftarKelasModel();
        $dataProv = $prov->findAll();
        $adMhs = $mahasiswa->addres($id);
        $jurusan = new JurusanModel();
        return view('admin/mahasiswa/edit_mahasiswa', [
            "title" => "editMahasiswa",
            "data" => $adMhs[0],
            "provinsi" => $dataProv,
            "jurusan" => $jurusan->findAll(),
            "kelas" => $kelas->findAll()
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
        $matkulMahasiswa = new MatakuliahMahasiswaModel();
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
        $updateMatkul = $matkulMahasiswa->where(['keterangan' => 'berlangsung'])->findAll();
        $mahasiswa = new MahasiswaModel();
        $dataMhs = $mahasiswa->findAll();
        $matkul = new MatakuliahModel();
        $jurusan =  new JurusanModel();
        $daftarKelas = new DaftarKelasModel();
        $matkul = new MatakuliahModel();
        $matkulMhsInsert = new MatakuliahMahasiswaModel();
        for ($i = 0; $i < count($updateMatkul); $i++) {
            $id = $updateMatkul[$i]['id'];
            $matkulMahasiswa->where('nim_mahasiswa', $updateMatkul[$i]['nim_mahasiswa'])->update($id, [
                'keterangan' => 'selesai'
            ]);
        }
        $i = 0;
        foreach ($dataMhs as $x) {
            $dataJurusan[] = $jurusan->where('kode', $x['kode_jurusan'])->findAll();
            $dataDaftarKelas[] = $daftarKelas->where('id', $x['id_kelas'])->findAll();
            $Datasemester = $semester->where(['nim_mahasiswa' => $x['nim'], 'keterangan' => 'berlangsung'])->findAll();
            // die;
            $dataMatkulMhs2 = $matkul->where(['kode_jurusan' => $x['kode_jurusan'], 'id_daftar_kelas' => $x['id_kelas'], 'semester' => $Datasemester[0]['semester']])->findAll();
            if (count($dataMatkulMhs2) > $i) {
                for ($j = 0; $j < count($dataMatkulMhs2); $j++) {
                    $matkulMhsInsert->insert([
                        'kode_matkul' => $dataMatkulMhs2[$j]['kode_matkul'],
                        'nim_mahasiswa' => $x['nim'],
                        'keterangan' => 'berlangsung'
                    ]);
                }
            } else {
                $matkulMhsInsert->insert([
                    'kode_matkul' => $dataMatkulMhs2[0]['kode_matkul'],
                    'nim_mahasiswa' => $x['nim'],
                    'keterangan' => 'berlangsung'
                ]);
            }
            $i++;
        }

        return redirect('admin/mahasiswa');
    }
    // end mahasiswa


}

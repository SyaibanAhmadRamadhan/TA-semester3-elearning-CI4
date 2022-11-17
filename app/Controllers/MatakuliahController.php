<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarKelasModel;
use App\Models\DosenModel;
use App\Models\JurusanModel;
use App\Models\KelasModel;
use App\Models\MahasiswaModel;
use App\Models\MatakuliahMahasiswaModel;
use App\Models\MatakuliahModel;
use App\Models\RuangModel;
use App\Models\SemesterModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;

use function PHPUnit\Framework\fileExists;

class MatakuliahController extends BaseController
{
    public function dataMatakuliah()
    {
        $matkul = new MatakuliahModel();
        $kelas = new DaftarKelasModel();
        $ruangan = new RuangModel();
        $jurusan = new JurusanModel();
        $dosen = new DosenModel();
        if ($matkul->findAll()) {
            foreach ($matkul->findAll() as $x) {
                $dataKelas[] = $kelas->where('id', $x['id_daftar_kelas'])->findAll();
                $noRuang[] = $ruangan->where('id', $x['no_ruang'])->findAll();
                $dataJurusan[] = $jurusan->where('kode', $x['kode_jurusan'])->findAll();
                $dataDosen[] = $dosen->where('nip', $x['nip_dosen'])->findAll();
            }
        } else {
            $dataKelas[] = '';
            $noRuang[] = '';
            $dataJurusan[] = '';
            $dataDosen[] = '';
        }
        return view('admin/matakuliah/data_matakuliah', [
            'title' => 'dataMatakuliah',
            'matkul' => $matkul->findAll(),
            'kelas' => $dataKelas,
            'ruangan' => $noRuang,
            'jurusan' => $dataJurusan,
            'dosen' => $dataDosen
        ]);
    }

    public function addMatakuliah()
    {

        $isValidate = $this->validate([
            'name' => 'required',
        ]);
        if ($isValidate) {
            $matkul = new MatakuliahModel();
            $sms = new SemesterModel();
            $matkulMhs = new MatakuliahMahasiswaModel();
            foreach ($this->request->getFileMultiple('materi') as $x) {
                $oriFile = $x->getName();
                $x->move('uploads/materi/' . $this->request->getPost('kode') . '/', $oriFile);
            }
            unlink('uploads/materi/' . $this->request->getPost('kode') . '/index.html');
            $matkul->insert([
                'kode_matkul' => $this->request->getPost('kode'),
                'name_matkul' => $this->request->getPost('name'),
                'semester' => $this->request->getPost('semester'),
                'sks' => $this->request->getPost('sks'),
                'no_ruang' => $this->request->getPost('no_ruang'),
                'hari' => $this->request->getPost('hari'),
                'masuk' => $this->request->getPost('masuk'),
                'selesai' => $this->request->getPost('keluar'),
                'kode_jurusan' => $this->request->getPost('jurusan'),
                'nip_dosen' => $this->request->getPost('dosen'),
                'id_daftar_kelas' => $this->request->getPost('kelas'),
                'id_daftar_kelas' => $this->request->getPost('kelas'),
                'materi' => $this->request->getPost('kode'),
            ]);
            $dataSms = $sms->where(['semester' => $this->request->getPost('semester'), 'keterangan' => 'berlangsung'])->findAll();
            if (count($dataSms) > 0) {
                foreach ($dataSms as $key => $x) {
                    $matkulMhs->insert([
                        'nim_mahasiswa' => $x['nim_mahasiswa'],
                        'kode_matkul' => $this->request->getPost('kode'),
                        'keterangan' => 'berlangsung'
                    ]);
                }
            }
            return redirect('admin/matakuliah');
        }
        $jurusan = new JurusanModel();
        $ruang = new RuangModel();
        return view('admin/matakuliah/add_matakuliah', [
            'title' => 'addMatakuliah',
            'jurusan' => $jurusan->findAll(),
            'ruang' => $ruang->findAll()
        ]);
    }

    public function editMatakuliah($id)
    {
        $isValidate = $this->validate([
            'name' => 'required',
        ]);
        if ($isValidate) {
            // if (file_exists('uploads/materi/' . $id . '.zip')) {
            //     print_r('true');
            // } else {
            //     print_r('false');
            // }
            // die;
            if ($_FILES['materi']['size'][0] != 0) {
                function rrmdir($dir)
                {
                    if (is_dir($dir)) {
                        $objects = scandir($dir);
                        foreach ($objects as $object) {
                            if ($object != "." && $object != "..") {
                                if (filetype($dir . "/" . $object) == "dir") rrmdir($dir . "/" . $object);
                                else unlink($dir . "/" . $object);
                            }
                        }
                        reset($objects);
                        rmdir($dir);
                    }
                }
                if ($id != $this->request->getPost('kode')) {
                    rrmdir('uploads/materi/' . $id);
                }
                rrmdir('uploads/materi/' . $this->request->getPost('kode'));
                if (file_exists('uploads/materi/' . $id . '.zip')) {
                    unlink('uploads/materi/' . $id . '.zip');
                }
                $kode = $this->request->getPost('kode');
                $mkdir = 'uploads/materi/' . $kode;
                $matkul = new MatakuliahModel();
                foreach ($this->request->getFileMultiple('materi') as $x) {
                    $oriFile = $x->getName();
                    $x->move($mkdir, $oriFile);
                }
                unlink('uploads/materi/' . $this->request->getPost('kode') . '/index.html');
                $matkul->update($id, [
                    'kode_matkul' => $this->request->getPost('kode'),
                    'name_matkul' => $this->request->getPost('name'),
                    'semester' => $this->request->getPost('semester'),
                    'sks' => $this->request->getPost('sks'),
                    'no_ruang' => $this->request->getPost('no_ruang'),
                    'hari' => $this->request->getPost('hari'),
                    'masuk' => $this->request->getPost('masuk'),
                    'selesai' => $this->request->getPost('keluar'),
                    'kode_jurusan' => $this->request->getPost('jurusan'),
                    'nip_dosen' => $this->request->getPost('dosen'),
                    'id_daftar_kelas' => $this->request->getPost('kelas'),
                    'materi' => $this->request->getPost('kode'),
                ]);
                return redirect('admin/matakuliah');
            } else {
                $matkul = new MatakuliahModel();
                if ($id != $this->request->getPost('kode')) {
                    rename('uploads/materi/' . $id, 'uploads/materi/' . $this->request->getPost('kode'));
                    $matkul->update($id, [
                        'materi' => $this->request->getPost('kode')
                    ]);
                    if (file_exists('uploads/materi/' . $id . '.zip')) {
                        unlink('uploads/materi/' . $id . '.zip');
                    }
                }
                $matkul->update($id, [
                    'kode_matkul' => $this->request->getPost('kode'),
                    'name_matkul' => $this->request->getPost('name'),
                    'semester' => $this->request->getPost('semester'),
                    'sks' => $this->request->getPost('sks'),
                    'no_ruang' => $this->request->getPost('no_ruang'),
                    'hari' => $this->request->getPost('hari'),
                    'masuk' => $this->request->getPost('masuk'),
                    'selesai' => $this->request->getPost('keluar'),
                    'kode_jurusan' => $this->request->getPost('jurusan'),
                    'nip_dosen' => $this->request->getPost('dosen'),
                    'id_daftar_kelas' => $this->request->getPost('kelas'),
                ]);
                return redirect('admin/matakuliah');
            }
        }
        $jurusan = new JurusanModel();
        $matkul = new MatakuliahModel();
        $dataMatkul = $matkul->where('kode_matkul', $id)->first();
        $ruang = new RuangModel();
        return view('admin/matakuliah/edit_matakuliah', [
            'title' => 'addMatakuliah',
            'jurusan' => $jurusan->findAll(),
            'ruang' => $ruang->findAll(),
            'dataMatkul' => $dataMatkul
        ]);
    }

    public function deleteMatakuliah($id)
    {
        $matkul = new MatakuliahModel();
        $datamatkul = $matkul->where('kode_matkul', $id)->find();
        if (!$datamatkul) {
            throw PageNotFoundException::forPageNotFound();
        }
        function rrmdir($dir)
        {
            if (is_dir($dir)) {
                $objects = scandir($dir);
                foreach ($objects as $object) {
                    if ($object != "." && $object != "..") {
                        if (filetype($dir . "/" . $object) == "dir") rrmdir($dir . "/" . $object);
                        else unlink($dir . "/" . $object);
                    }
                }
                reset($objects);
                rmdir($dir);
            }
        }
        rrmdir('uploads/materi/' . $id);
        if (file_exists('uploads/materi/' . $id . '.zip')) {
            unlink('uploads/materi/' . $id . '.zip');
        }
        $matkul->delete($id);
        return redirect('admin/matakuliah');
    }

    public function downloadMateri($id)
    {
        // Get real path for our folder
        $rootPath = realpath('uploads/materi/' . $id);

        // Initialize archive object
        $zip = new ZipArchive();
        $zip->open('uploads/materi/' . $id . '.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

        // Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
            // Skip directories (they would be added automatically)
            if (!$file->isDir()) {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);

                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }

        // Zip archive will be created only after closing object
        $zip->close();
        return $this->response->download('uploads/materi/' . $id . '.zip', null);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DokterModel;

class DokterController extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Data Dokter | Temuku'];
        $model = new DokterModel();
        $data['dokter'] = $model->findAll();
        return view('/pages/dokter', $data);
    }

    public function simpan()
    {
        $id = $this->request->getPost('id');
        $foto = $this->request->getFile('foto');
        $ttd  = $this->request->getFile('ttd');

        // Validasi file upload
        if ($foto->isValid() && !$foto->hasMoved() && $ttd->isValid() && !$ttd->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $ttdName  = $ttd->getRandomName();

            $foto->move('assets/img/foto', $fotoName);
            $ttd->move('assets/img/ttd', $ttdName);

            $model = new \App\Models\DokterModel();
            $model->save([
                'id' => $id,
                'nama' => $this->request->getPost('nama'),
                'spesialisasi' => $this->request->getPost('spesialisasi'),
                'foto' => $fotoName,
                'ttd' => $ttdName,
            ]);
        }

        return redirect()->to('/dokter');
    }


    public function hapus()
    {
        $id = $this->request->getPost('id');
        $model = new DokterModel();
        $model->delete($id);

        return redirect()->to('/dokter');
    }
}

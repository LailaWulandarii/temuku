<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PasienModel;


class PasienController extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Data Pasien | Temuku'];
        $model = new PasienModel();
        $data['pasien'] = $model->findAll();
        return view('/pages/pasien', $data);
    }

    public function simpan()
    {
        $id = $this->request->getPost('id');
        $model = new \App\Models\PasienModel();
        $model->save([
            'id' => $id,
            'nama' => $this->request->getPost('nama'),
            'keluhan' => $this->request->getPost('keluhan'),
        ]);
        return redirect()->to('/pasien');
    }

    public function hapus()
    {
        $id = $this->request->getPost('id');
        $model = new \App\Models\PasienModel();
        $model->delete($id);
        return redirect()->to('/pasien');
    }
}

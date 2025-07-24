<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\JadwalTemuModel;
use App\Models\DokterModel;
use App\Models\PasienModel;

class JadwalController extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Jadwal Temu | Temuku'];
        $jadwalModel = new JadwalTemuModel();
        $data['jadwal'] = $jadwalModel->getWithRelasi();
        $data['dokter'] = (new DokterModel())->findAll();
        $data['pasien'] = (new PasienModel())->findAll();
        return view('/pages/jadwal', $data);
    }
    public function simpan()
    {
        $id = $this->request->getPost('id');
        $model = new \App\Models\JadwalTemuModel();
        $model->save([
            'id' => $id,
            'id_dokter' => $this->request->getPost('id_dokter'),
            'id_pasien' => $this->request->getPost('id_pasien'),
            'waktu_jadwal' => $this->request->getPost('waktu_jadwal'),
        ]);
        return redirect()->to('/jadwal');
    }

    public function hapus()
    {
        $id = $this->request->getPost('id');
        $model = new \App\Models\JadwalTemuModel();
        $model->delete($id);
        return redirect()->to('/jadwal');
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalTemuModel extends Model
{
    protected $table            = 'jadwal_temu';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_dokter', 'id_pasien', 'waktu_jadwal'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getWithRelasi()
    {
        return $this->select('jadwal_temu.*, dokter.nama AS nama_dokter, dokter.spesialisasi AS spesialisasi, pasien.nama AS nama_pasien')
            ->join('dokter', 'dokter.id = jadwal_temu.id_dokter')
            ->join('pasien', 'pasien.id = jadwal_temu.id_pasien')
            ->findAll();
    }
}

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dokter', 'DokterController::index');
$routes->post('/dokter/simpan', 'DokterController::simpan');
$routes->post('/dokter/hapus', 'DokterController::hapus');
$routes->get('/pasien', 'PasienController::index');
$routes->post('/pasien/simpan', 'PasienController::simpan');
$routes->post('/pasien/hapus', 'PasienController::hapus');
$routes->get('/jadwal', 'JadwalController::index');
$routes->post('/jadwal/simpan', 'JadwalController::simpan');
$routes->post('/jadwal/hapus', 'JadwalController::hapus');

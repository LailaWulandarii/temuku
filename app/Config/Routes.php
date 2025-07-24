<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('dokter', function ($routes) {
    $routes->get('/', 'DokterController::index');
    $routes->post('simpan', 'DokterController::simpan');
    $routes->post('hapus', 'DokterController::hapus');
});

$routes->group('pasien', function ($routes) {
    $routes->get('/', 'PasienController::index');
    $routes->post('simpan', 'PasienController::simpan');
    $routes->post('hapus', 'PasienController::hapus');
});

$routes->group('jadwal', function ($routes) {
    $routes->get('/', 'JadwalController::index');
    $routes->post('simpan', 'JadwalController::simpan');
    $routes->post('hapus', 'JadwalController::hapus');
});

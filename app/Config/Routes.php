<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// routes login carissa sisca

$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::login');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/', 'AdminController::index');

// admin
$routes->group('admin', ['filter' => 'usersAuth'], function ($routes) {
    $routes->get('/', 'AdminController::index');
    // mahasiswa
    $routes->post('mahasiswa/update/semester', 'MahasiswaController::updateSemester');
    $routes->add('mahasiswa/add', 'MahasiswaController::addMahasiswa');
    $routes->get('mahasiswa', 'MahasiswaController::dataMahasiswa');
    $routes->get('mahasiswa/(:segment)/detail', 'MahasiswaController::detailMahasiswa/$1');
    $routes->add('mahasiswa/(:segment)/edit', 'MahasiswaController::editMahasiswa/$1');
    $routes->get('mahasiswa/(:segment)/delete', 'MahasiswaController::deleteMahasiswa/$1');

    // dosen
    $routes->add('dosen/add', 'DosenController::addDosen');
    $routes->get('dosen', 'DosenController::dataDosen');
    $routes->get('dosen/(:segment)/detail', 'DosenController::detailDosen/$1');
    $routes->add('dosen/(:segment)/edit', 'DosenController::editDosen/$1');
    $routes->get('dosen/(:segment)/delete', 'DosenController::deleteDosen/$1');

    // jurusan
    $routes->add('jurusan/add', 'JurusanController::addJurusan');
    $routes->get('jurusan', 'JurusanController::dataJurusan');
    $routes->get('jurusan/(:segment)/delete', 'JurusanController::deleteJurusan/$1');
    $routes->add('jurusan/(:segment)/edit', 'JurusanController::editJurusan/$1');

    // matakuliah
    $routes->post('matakuliah/update/semester', 'MatakuliahController::updateMatakuliah');
    $routes->add('matakuliah/add', 'MatakuliahController::addMatakuliah');
    $routes->get('matakuliah', 'MatakuliahController::dataMatakuliah');
    $routes->add('matakuliah/(:segment)/edit', 'MatakuliahController::editMatakuliah/$1');
    $routes->get('matakuliah/(:segment)/delete', 'MatakuliahController::deleteMatakuliah/$1');
});

// dosen
$routes->group('dosen',  ['filter' => 'dosenAuth'], function ($routes) {
    $routes->get('/', 'DosenDashboardController::index');
    $routes->get('jadwalDosen', 'DosenDashboardController::jadwalDosen');
});
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('form', 'Home::index');
$routes->get('validateEmpId', 'Home::validate_EmpId');

$routes->group('superadmin', static function ($routes) {
    $routes->get('register', 'AuthController::superadminregister');
    $routes->post('register', 'AuthController::superadminregister');
    $routes->get('login', 'AuthController::superadminlogin');
    $routes->post('login', 'AuthController::superadminlogin');
    $routes->get('logout', 'AuthController::superAdminlogout');

    $routes->get('dashboard', 'SuperAdminController::superadminDashboard', ['filter' => 'IsSuperAdmin'], );
    $routes->get('fetchData', 'SuperAdminController::SuperAdminfetchData', ['filter' => 'IsSuperAdmin']);
    $routes->get('editForm?(:any)', 'SuperAdminController::SuperAdminEdit/$1', ['filter' => 'IsSuperAdmin']);
    $routes->get('edata', 'SuperAdminController::SuperAdminEditData', ['filter' => 'IsSuperAdmin']);
    $routes->post('editformdata', 'SuperAdminController::SuperAdminEditformdata', ['filter' => 'IsSuperAdmin']);
    $routes->get('validate_UHID', 'SuperAdminController::validateUHID', ['filter' => 'IsSuperAdmin']);

    $routes->get('newMemberDashboard', 'SuperAdminController::newDashboard', ['filter' => 'IsSuperAdmin']);
    $routes->get('newRegisterRecords', 'SuperAdminController::newRegisterRecords', ['filter' => 'IsSuperAdmin']);
    $routes->get('newRegistration', 'SuperAdminController::AddNewMember', ['filter' => 'IsSuperAdmin']);
    $routes->post('newRegistration', 'SuperAdminController::AddNewMember', ['filter' => 'IsSuperAdmin']);
    $routes->get('editProfile?(:any)', 'SuperAdminController::editImage/$1', ['filter' => 'IsSuperAdmin']);
    $routes->post('editProfileImage', 'SuperAdminController::editProfileImage', ['filter' => 'IsSuperAdmin']);
    $routes->get('viewUserData?(:any)', 'SuperAdminController::viewUserData/$1', ['filter' => 'IsSuperAdmin']);
    $routes->get('generatePdf?(:any)', 'SuperAdminController::generatePdf/$1', ['filter' => 'IsSuperAdmin']);
    // $routes->get('pdf', 'SuperAdminController::viewPdf', ['filter' => 'IsSuperAdmin']);
    $routes->get('zip?(:any)', 'SuperAdminController::downloadZip/$1', ['filter' => 'IsSuperAdmin']);

    $routes->get('viewUserData?(:any)', 'SuperAdminController::ViewOfflineUserData/$1', ['filter' => 'IsSuperAdmin']);
    $routes->get('offlinegeneratePdf?(:any)', 'SuperAdminController::generateOfflinePdf/$1', ['filter' => 'IsSuperAdmin']);
});

$routes->group('admin', static function ($routes) {
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::register');
    $routes->get('login', 'AuthController::adminLogin');
    $routes->post('login', 'AuthController::adminLogin');
    $routes->get('logout', 'AuthController::Adminlogout');

    $routes->get('dashboard', 'AdminController::adminDashboard', ['filter' => 'IsAdmin']);
    $routes->get('validateUHID', 'SuperAdminController::validate_UHID', ['filter' => 'IsAdmin']);
    $routes->get('adminfetchdata', 'AdminController::AdminfetchData', ['filter' => 'IsAdmin']);
    $routes->get('viewUserData?(:any)', 'AdminController::viewUserData/$1', ['filter' => 'IsAdmin']);
    $routes->get('zip?(:any)', 'AdminController::downloadZip/$1', ['filter' => 'IsAdmin']);
});
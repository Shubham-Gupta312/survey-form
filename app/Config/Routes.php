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

    $routes->get('dashboard', 'Home::superadminDashboard', ['filter' => 'IsSuperAdmin'],);
    $routes->get('fetchData', 'Home::SuperAdminfetchData', ['filter' => 'IsSuperAdmin']);
    $routes->get('editForm?(:any)', 'Home::SuperAdminEdit/$1', ['filter' => 'IsSuperAdmin']);
    $routes->get('edata', 'Home::SuperAdminEditData', ['filter' => 'IsSuperAdmin']);
});


$routes->get('admin/register', 'AuthController::register');
$routes->get('admin/login', 'AuthController::login');

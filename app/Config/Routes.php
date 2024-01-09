<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/generate', 'Home::generate');
$routes->get('/forbidden', 'Home::forbidden');


$routes->get('/login', 'auth::login');
$routes->post('/auth/login_process', 'auth::login_process');
$routes->get('/logout', 'auth::logout');


$routes->get('/admin', 'admin::index');
$routes->get('/admin/dash', 'admin::index');
$routes->get('/admin/employee_db', 'admin::employee_db');
$routes->get('/admin/add_employee', 'admin::add_employee');
$routes->post('/admin/save_employee', 'admin::save_employee');
$routes->get('/admin/edit_employee/(:any)', 'admin::edit_employee/$1');
$routes->put('/admin/update_employee/(:any)', 'admin::update_employee/$1');
$routes->delete('/admin/delete_employee/(:any)', 'admin::delete_employee/$1');
$routes->get('/admin/periodic_db', 'admin::periodic_db');
$routes->get('/admin/add_periodic', 'admin::add_periodic');
$routes->post('/admin/save_periodic', 'admin::save_periodic');
$routes->get('/admin/edit_periodic/(:any)', 'admin::edit_periodic/$1');
$routes->put('/admin/update_periodic/(:any)', 'admin::update_periodic/$1');
$routes->delete('/admin/delete_periodic/(:any)', 'admin::delete_periodic/$1');

$routes->get('manager/staff_db', 'Manager::staff_db');
$routes->get('manager/periodic_db', 'Manager::periodic_db');
$routes->get('manager/dash', 'Manager::index');
$routes->get('manager/goal_db', 'Manager::goal_db');
$routes->post('manager/approve/(:any)', 'Manager::approve/$1');
$routes->get('manager/ratings_db', 'Manager::ratings_db');
$routes->post('manager/ratings_filter', 'Manager::ratings_filter');
$routes->get('manager/ratings_periodic/(:any)', 'Manager::ratings_periodic/$1');
$routes->get('manager/ratings_detail/(:any)', 'Manager::ratings_detail/$1');
$routes->presenter('manager');

$routes->get('/staff', 'staff::index');
$routes->get('/staff/dash', 'staff::index');
$routes->get('/staff/my_goals', 'staff::my_goals');
$routes->get('/staff/my_kpi', 'staff::my_kpi');
$routes->get('/staff/kpi_detail/(:any)', 'staff::kpi_detail/$1');




/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

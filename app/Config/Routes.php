<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public Routes
$routes->get('/', 'Home::index');
$routes->get('profile', 'Home::profile');
$routes->get('activity', 'Home::activity');
$routes->get('education', 'Home::education');

// Admin Login Routes
$routes->get('admin', 'Admin\Auth::login');
$routes->post('admin/login', 'Admin\Auth::loginAttempt');
$routes->get('admin/logout', 'Admin\Auth::logout');

// Admin Routes (Protected)
$routes->group('admin', ['filter' => 'adminauth'], function($routes) {
    // Dashboard
    $routes->get('dashboard', 'Admin\Dashboard::index');
    
    // Activity Routes
    $routes->get('activity', 'Admin\Activity::index');
    $routes->get('activity/create', 'Admin\Activity::create');
    $routes->post('activity/store', 'Admin\Activity::store');
    $routes->get('activity/edit/(:num)', 'Admin\Activity::edit/$1');
    $routes->post('activity/update/(:num)', 'Admin\Activity::update/$1');
    $routes->get('activity/delete/(:num)', 'Admin\Activity::delete/$1');

    // Profile Routes
    $routes->get('profile', 'Admin\Profile::index');
    $routes->get('profile/create', 'Admin\Profile::create');
    $routes->post('profile/store', 'Admin\Profile::store');
    $routes->get('profile/edit/(:num)', 'Admin\Profile::edit/$1');
    $routes->post('profile/update/(:num)', 'Admin\Profile::update/$1');
    $routes->get('profile/delete/(:num)', 'Admin\Profile::delete/$1');

    // Education Routes
    $routes->get('education', 'Admin\Education::index');
    $routes->get('education/create', 'Admin\Education::create');
    $routes->post('education/store', 'Admin\Education::store');
    $routes->get('education/edit/(:num)', 'Admin\Education::edit/$1');
    $routes->post('education/update/(:num)', 'Admin\Education::update/$1');
    $routes->get('education/delete/(:num)', 'Admin\Education::delete/$1');

    // Settings Routes
    $routes->get('settings', 'Admin\Settings::index');
    $routes->post('settings/update', 'Admin\Settings::update');
});

<?php

use CodeIgniter\Router\RouteCollection;

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
/**
 * ---------------------------------------------------------
 * Route Definations
 * ---------------------------------------------------------
 */
$routes->get('/', 'Home::index');

$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    // Add all routes need protected by this filter;
    $routes->get('/dashboard', 'Dashboard::index');
    $routes->get('/dashboard/profile', 'Dashboard::profile');
    $routes->get('/dashboard/test', 'Dashboard::test');

});

$routes->group('', ['filter' => 'AlreadyLoggedIn'], function ($routes) {
    // Add all routes need protected by this filter;
    $routes->get('/auth', 'Auth::index');
    $routes->get('/auth/register', 'Auth::register');

});

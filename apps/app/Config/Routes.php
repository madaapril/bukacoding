<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->get('/syarat-ketentuan', 'Auth::syarat_ketentuan');
$routes->get('/forgot-password', 'Auth::forgot_password');

$routes->get('/dashboard', 'Dashboard::index');

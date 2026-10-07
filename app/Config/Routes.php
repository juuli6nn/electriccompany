<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/about', 'About::index'); 
$routes->get('/services', 'Services::index'); 
$routes->match(['GET', 'POST'], '/contact', 'Contact::index'); 
$routes->get('/register', 'Register::index'); 
$routes->post('/register', 'Register::create');


$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::dashboard');


$routes->get('account/view/(:num)', 'Home::viewAccount/$1');
$routes->get('account/create', 'Home::createAccount');
$routes->post('account/store', 'Home::storeAccount');
$routes->get('account/edit/(:num)', 'Home::editAccount/$1');
$routes->post('account/update/(:num)', 'Home::updateAccount/$1');
$routes->get('account/delete/(:num)', 'Home::deleteAccount/$1');


$routes->match(['GET', 'POST'], 'login', 'Home::login');
$routes->get('logout', 'Home::logout');


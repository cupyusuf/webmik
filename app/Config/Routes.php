<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('checkout', 'Home::checkout');
$routes->get('manga', 'Manga::index');
$routes->get('posts', 'Posts::index');
// Admin
$routes->get('admin', 'Admin::index', ['filter' => 'admin']);
$routes->post('admin/covers/upload', 'Admin::uploadCover', ['filter' => 'admin']);
$routes->match(['get', 'post'], 'admin/manga/edit/(:segment)', 'Admin::editManga/$1', ['filter' => 'admin']);
$routes->match(['get', 'post'], 'admin/posts/edit/(:segment)', 'Admin::editPost/$1', ['filter' => 'admin']);
// Auth
$routes->match(['get', 'post'], 'auth/login', 'Auth::login');
$routes->match(['get', 'post'], 'auth/register', 'Auth::register');
$routes->get('auth/logout', 'Auth::logout');

// Payment migration routes
$routes->post('snap/token', 'Payment::snapToken');
$routes->get('vtweb/checkout', 'Payment::vtweb');
$routes->post('vtdirect/charge', 'Payment::vtdirect_cc_charge');

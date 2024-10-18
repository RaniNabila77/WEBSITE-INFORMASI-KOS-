<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
 $routes->setDefaultController('Admin');
 $routes->setAutoRoute(true);
 $routes->get('/', 'Admin::index');

 $routes->get('/admin/login-admin', 'Admin::index');
 $routes->post('/admin/cek-login-admin', 'Admin::cek_login_admin');
 $routes->get('/admin/dashboard-admin', 'Admin::dashboard');
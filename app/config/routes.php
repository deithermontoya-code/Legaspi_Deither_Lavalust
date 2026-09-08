<?php

$router->get('/student', 'StudentController::index', 
            ['middleware' => 'StudentMiddleware']);

$router->get('/student/profile', 'StudentController::profile', 
            ['middleware' => 'StudentMiddleware']);
$router->get('/users', 'UserController::showUsers');
$router->get('/login', 'AuthController::login');
$router->post('/login', 'AuthController::authenticate');
$router->get('/register', 'AuthController::register');
$router->post('/register', 'AuthController::store_register');
$router->get('/logout', 'AuthController::logout');

$router->get('/products', 'ProductController::index')->middleware('auth');
$router->get('/products/create', 'ProductController::create')->middleware(['auth', 'admin']);
$router->post('/products/create', 'ProductController::store')->middleware(['auth', 'admin']);
$router->get('/products/edit/{id}', 'ProductController::edit')->middleware(['auth', 'admin'])->where_number('id');
$router->post('/products/edit/{id}', 'ProductController::update')->middleware(['auth', 'admin'])->where_number('id');
$router->post('/products/delete/{id}', 'ProductController::delete')->middleware(['auth', 'admin'])->where_number('id');
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setDefaultNamespace('Applications\Controllers');

$controllerName = \Applications\Controllers\Home::class;

$routes->get(
    '/',
    [
        $controllerName,
        'index'
    ],
    [
        'as' => 'default'
    ]
);

$controllerName = \Applications\Controllers\ScheduleValidateController::class;

$routes->get(
    'schedule-validate/list/(:num)',
    [
        $controllerName,
        'list',
    ],
    [
        'as' => 'schedule-validate-list'
    ]
);
$routes->post(
    'schedule-validate/create',
    [
        $controllerName,
        'create',
    ],
    [
        'as' => 'schedule-validate-create'
    ]
);
$routes->patch(
    'schedule-validate/(:num)/update',
    [
        $controllerName,
        'update',
    ],
    [
        'as' => 'schedule-validate-update'
    ]
);
$routes->delete(
    'schedule-validate/(:num)/delete',
    [
        $controllerName,
        'delete',
    ],
    [
        'as' => 'schedule-validate-delete'
    ]
);

$controllerName = \Applications\Controllers\ExcelController::class;
$routes->get(
    'excel/download',
    [
        $controllerName,
        'download',
    ],
    [
        'as' => 'excel-download'
    ]
);

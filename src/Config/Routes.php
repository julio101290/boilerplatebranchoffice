<?php


$routes->group('admin', function ($routes) {


    $routes->get('sucursales/usuariosPorSucursal/(:any)'
    , 'BranchofficesController::usuariosPorSucursal/$1'
    , ['namespace' => 'julio101290\boilerplatebranchoffice\Controllers']
    );

    $routes->resource('branchoffices', [
        'filter' => 'permission:branchoffices-permission',
        'controller' => 'branchofficesController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplatebranchoffice\Controllers',
    ]);

    $routes->post('branchoffices/save'
                , 'BranchofficesController::save'
                , ['namespace' => 'julio101290\boilerplatebranchoffice\Controllers']
            );
    $routes->post('branchoffices/getBranchoffices'
                , 'BranchofficesController::getBranchoffices'
                , ['namespace' => 'julio101290\boilerplatebranchoffice\Controllers']
                );


    $routes->post('usuariosSucursal/getUsuariosSucursal'
                    , 'UsuariosSucursalController::getUsuariosSucursal'
                    , ['namespace' => 'julio101290\boilerplatebranchoffice\Controllers']
                );


    $routes->post('sucursales/activarDesactivar'
                , 'BranchofficesController::activarDesactivar'
                ,  ['namespace' => 'julio101290\boilerplatebranchoffice\Controllers']
                );
                
    $routes->post('sucursales/getSucursalesAjax'
                , 'BranchofficesController::getSucursalesAjax'
                , ['namespace' => 'julio101290\boilerplatebranchoffice\Controllers']
                );


});

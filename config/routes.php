<?php
    $config = array(
        'default' => array(
            'class' => 'SSH\Controllers\LoginController',
            'method' => 'index'
        ),
        'home' => array(
            'class' => 'SSH\Controllers\HomeController',
            'method' => 'index'
        ),
        'login' => array(
            'class' => 'SSH\Controllers\LoginController',
            'method' => 'index'
        ),
        'logout' => array(
            'class' => 'SSH\Controllers\LogoutController',
            'method' => 'index'
        ),
        'facebook-status-change' => array(
            'class' => 'SSH\Controllers\FacebookController',
            'method' => 'status_change'
        ),
        'deauth' => array(
            'class' => 'SSH\Controllers\DeauthController',
            'method' => 'index'
        )
    );

    return $config;
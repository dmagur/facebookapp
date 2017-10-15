<?php
namespace SSH\Controllers;

use SSH\Core\Controller;

/**
 * Class LogoutController
 * @package SSH\Controllers
 */
class LogoutController extends Controller{
    function index(){
        if (isset($_SESSION['uid'])) unset($_SESSION['uid']);
        $this->redirect('/');
    }
}
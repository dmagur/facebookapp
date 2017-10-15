<?php
namespace SSH\Controllers;

use SSH\Core\Controller;

/**
 * Class LoginController
 * @package SSH\Controllers
 */
class LoginController extends Controller{
    function index(){
        $this->out('login');
    }
}
<?php
namespace SSH\Controllers;

use SSH\Core\Controller;
use SSH\Models\User;

/**
 * Class HomeController
 * @package SSH\Controllers
 */
class HomeController extends Controller{
    function index(){
        if (empty($_SESSION['uid'])){
            $this->redirect('/');
            return;
        }

        $user_model = new User($this->db_connection->get_connection());
        $user = $user_model->get($_SESSION['uid']);

        if (!$user['is_active']){
            unset($_SESSION['uid']);
            $this->redirect("/");
        }

        $this->out('home','default',['user' => $user]);
    }
}
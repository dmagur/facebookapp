<?php
namespace SSH\Controllers;

use SSH\Core\Controller;
use SSH\Models\User;
use SSH\Services\FacebookSignedRequestService;

/**
 * Class DeauthController
 * @package SSH\Controllers
 */
class DeauthController extends Controller{
    /**
     * controller for Facebook deauth callback
     */
    function index(){
        if (isset($_POST['signed_request'])) {
            $data = FacebookSignedRequestService::parse_signed_request($_POST['signed_request'],$this->facebook_config->get('app_secret'));
            if ($data){
                $data = json_decode($data);
                if (!empty($data['user_id'])){
                    $user = new User($this->db_connection->get_connection());
                    $user->update([
                        'id' => $data['user_id'],
                        'is_active' => 0
                    ]);
                }
            }
        }
    }
}
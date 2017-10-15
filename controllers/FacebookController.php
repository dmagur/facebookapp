<?php
namespace SSH\Controllers;

use SSH\Core\Controller;
use SSH\Models\User;
use SSH\Services\FacebookUserService;

/**
 * Class FacebookController
 * @package SSH\Controllers
 */
class FacebookController extends Controller{
    /**
     * @return string
     */
    function status_change(){
        $user_model = new User($this->db_connection->get_connection());
        $user = $user_model->get($_REQUEST['authResponse']['userID']);

        $service = new FacebookUserService($this->facebook_config);
        $fb = $service->get_fb();

        $fb_client = $fb->getOAuth2Client();
        $access_token = $fb_client->getLongLivedAccessToken($_REQUEST['authResponse']['accessToken']);

        if (!$user){
            $fbuser = $service->get_user_data($access_token);
            $user_model->insert([
                'id' => $_REQUEST['authResponse']['userID'],
                'accessToken' => $access_token,
                'status'    =>  $_REQUEST['authResponse']['status'],
                'is_active' => 1,
                'picture' => $fbuser['picture']->getUrl(),
                'name' => $fbuser->getField('name')
            ]);
        }
        else{
            $updated_data = [
                'id' => $_REQUEST['authResponse']['userID'],
                'accessToken' => $access_token,
                'status'    =>  $_REQUEST['status'],
                'is_active' => 1,
            ];

            if (empty($_SESSION['uid'])){
                $fbuser = $service->get_user_data($access_token);
                $updated_data['picture'] = $fbuser['picture']->getUrl();
                $updated_data['name'] = $fbuser->getField('name');
            }

            $user_model->update($updated_data);
        }

        $_SESSION['uid'] = $_REQUEST['authResponse']['userID'];

        return json_encode($_REQUEST);
    }
}
<?php
namespace SSH\Services;

use SSH\Contracts\ConfigProvider;
use Facebook;

/**
 * Class FacebookUserService
 * @package SSH\Services
 */
class FacebookUserService{
    /**
     * @var ConfigProvider
     */
    private $facebook_config;

    /**
     * @var Facebook\Facebook
     */
    private $fb;

    public function __construct(ConfigProvider $facebook_config){
        $this->facebook_config = $facebook_config;

        $this->fb = new Facebook\Facebook([
            'app_id' => $this->facebook_config->get('app_id'),
            'app_secret' => $this->facebook_config->get('app_secret'),
            'default_graph_version' => $this->facebook_config->get('graph_version'),
        ]);
    }

    /**
     * @return Facebook\Facebook
     */
    public function get_fb(): Facebook\Facebook{
        return $this->fb;
    }

    /**
     * @param string $access_token
     * @return Facebook\GraphNodes\GraphUser
     */
    public function get_user_data(string $access_token): Facebook\GraphNodes\GraphUser {
        $response = $this->fb->get('/me?fields=name,picture', $access_token);
        return $response->getGraphUser();
    }
}
<?php
namespace SSH\Contracts;

/**
 * Interface ApplicationContract
 * @package SSH\Contracts
 */
interface ApplicationContract{
    /**
     * @param ConfigProvider $facebook_config
     * @return mixed
     */
    public function run(ConfigProvider $facebook_config);
}
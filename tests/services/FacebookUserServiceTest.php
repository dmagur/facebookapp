<?php
namespace SSH\Tests\Services;

use PHPUnit\Framework\TestCase;
use SSH\Core\Config;
use SSH\Services\FacebookUserService;
use Facebook\Facebook;

class FacebookUserServiceTest extends TestCase{
    /**
     * @test
     */
    public function testGetFb(){
        $config = new Config('facebook');
        $service = new FacebookUserService($config);
        $this->assertInstanceOf(Facebook::class,$service->get_fb());
    }
}
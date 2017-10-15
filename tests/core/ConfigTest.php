<?php
namespace SSH\Tests\Core;

use PHPUnit\Framework\TestCase;
use SSH\Core\Config;
use SSH\Exceptions\ConfigException;

/**
 * Class ConfigTest
 * @package SSH\Tests\Core
 */
class ConfigTest extends TestCase{
    /**
     * @test
     */
    public function testNotExistingConfig(){
        $this->expectException(ConfigException::class);
        $config = new Config('notexsiting');
    }

    /**
     * @test
     */
    public function testExistingParam(){
        $config = new Config('database');
        $this->assertNotEmpty($config->get('dbhost'));
    }

    public function notExistingParam(){
        $config = new Config('database');
        $this->assertEmpty($config->get('notexistingparam'));
    }
}
<?php
namespace SSH\Tests\Core;

use PHPUnit\Framework\TestCase;
use SSH\Core\Config;
use SSH\Core\MySqliDatabase;

class MySqliDatabaseTest extends TestCase{
    /**
     * @test
     */
    public function testConnection(){
        $config = new Config('database');
        $storage = new MySqliDatabase($config);
        $this->assertInstanceOf(\mysqli::class,$storage->get_connection());
    }
}
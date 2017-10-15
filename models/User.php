<?php
namespace SSH\Models;

use SSH\Core\Model;
use SSH\Core\MySqliModel;

/**
 * Class User
 * @package SSH\Models
 */
class User extends MySqliModel{
    /**
     * @var string table name
     */
    protected $table = 'user';
}
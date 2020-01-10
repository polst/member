<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Member\Config;

use Exception;
use BasicApp\Member\Libraries\UserService;

abstract class BaseServices extends \CodeIgniter\Config\BaseService
{

    public static function user($getShared = true)
    {
        if (!$getShared)
        {
            return new UserService('user_id');
        }

        return static::getSharedInstance(__FUNCTION__);
    }

}
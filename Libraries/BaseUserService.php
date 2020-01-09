<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Member\Libraries;

use BasicApp\User\Models\User;
use Exception;

abstract class BaseUserService extends \Denis303\Auth\AuthService implements \BasicApp\Member\UserServiceInterface
{

    public function login(User $user, bool $rememberMe = true)
    {
        $id = $user->getPrimaryKey();

        if (!$id)
        {
            throw new Exception('Primary key not defined.');
        }

        $this->setUserId($id, $rememberMe);
    }

    public function logout()
    {
        $this->unsetUserId();
    }

    // ToDo: move to member module

    public function getLoginUrl()
    {
        return Url::createUrl('user/login');
    }

    // ToDo: move to member module

    public function getLogoutUrl()
    {
        return Url::createUrl('user/logout');
    }

}
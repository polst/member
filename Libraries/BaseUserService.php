<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Member\Libraries;

use BasicApp\Helpers\Url;
use BasicApp\User\Models\UserModel;
use BasicApp\Member\UserModelInterface;
use Exception;

abstract class BaseUserService extends \Denis303\Auth\UserService implements \BasicApp\Member\UserServiceInterface
{

    protected $_user;

    public function can(string $permission) : bool
    {
        $user = $this->getUser();

        if (!$user)
        {
            return false;
        }

        return true; // not implemented
    }

    public function hasRole(string $role) : bool
    {
        $user = $this->getUser();

        if (!$user)
        {
            return false;
        }

        return true; // not implemented
    }

    public function getUser() : ?UserModelInterface
    {
        if (!$this->_user)
        {
            $userId = $this->getUserId();

            if ($userId)
            {
                $userModel = new UserModel;

                $this->_user = $userModel->find($userId);

                if (!$this->_user)
                {
                    $this->unsetUserId();
                }                
            }
        }

        return $this->_user;
    }

    public function login(UserModelInterface $user, bool $rememberMe = true)
    {
        $id = $user->getPrimaryKey();

        if (!$id)
        {
            throw new Exception('Primary key not defined.');
        }

        $this->setUserId($id, $rememberMe);
    }

    public function logout() : void
    {
        $this->unsetUserId();
    }

    // ToDo: move to member module

    public function getLoginUrl() : string
    {
        return Url::createUrl('user/login');
    }

    // ToDo: move to member module

    public function getLogoutUrl() : string
    {
        return Url::createUrl('user/logout');
    }

}
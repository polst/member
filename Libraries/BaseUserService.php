<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Member\Libraries;

use BasicApp\User\Models\UserModel;
use BasicApp\Member\UserModelInterface;
use Exception;

abstract class BaseUserService extends \Denis303\Auth\UserService implements \BasicApp\Member\UserServiceInterface
{

    protected $_user;

    public function getUser()
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
<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Member;

interface UserServiceInterface extends \Denis303\Auth\UserServiceInterface
{

    public function getUser();

    public function getLoginUrl();

    public function getLogoutUrl();

    public function logout();

    public function login(UserModelInterface $user, bool $rememberMe = true);

}
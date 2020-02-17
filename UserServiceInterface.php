<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Member;

interface UserServiceInterface extends \Denis303\Auth\UserServiceInterface
{

    public function can(string $permission) : bool; 

    public function hasRole(string $role) : bool;

    public function getUser() : ?UserInterface;

    public function getLoginUrl() : string;

    public function getLogoutUrl() : string;

    public function logout() : void;

    public function login(UserInterface $user, bool $rememberMe = true);

}
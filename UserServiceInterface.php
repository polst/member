<?php

namespace BasicApp\Member;

interface UserServiceInterface extends \Denis303\Auth\AuthServiceInterface
{

    public function getLoginUrl();

    public function getLogoutUrl();

    public function logout();

    public function login(UserModelInterface $user, bool $rememberMe = true);

}
<?php

namespace BasicApp\Member;

use BasicApp\User\Models\User;

interface UserServiceInterface extends \Denis303\Auth\AuthServiceInterface
{

    public function getLoginUrl();

    public function getLogoutUrl();

    public function logout();

    public function login(User $user, bool $rememberMe = true);

}
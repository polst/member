<?php

namespace BasicApp\Member;

interface MemberServiceInterface extends \Denis303\Auth\AuthServiceInterface
{

    public function getLoginUrl();

    public function getLogoutUrl();

    public function logout();

    public function login(MemberModelInterface $user, bool $rememberMe = true);

}
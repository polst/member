<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Member;

use BasicApp\Exceptions\ForbiddenException;

abstract class BaseMemberController extends \BasicApp\Core\Controller
{

    protected $user;

    public function __construct()
    {
        parent::__construct();

        $this->user = Services::user()->getUser();

        if (!$this->user)
        {
            throw new ForbiddenException('Access denied.');
        }
    }

}
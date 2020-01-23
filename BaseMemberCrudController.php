<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Member;

use BasicApp\Exceptions\ForbiddenException;
use BasicApp\Crud\CrudTrait;

abstract class BaseMemberCrudController extends \BasicApp\Core\Controller
{

    use CrudTrait;

    protected $userService = 'user';

    protected $user;

    public function __construct()
    {
        parent::__construct();

        $this->user = service($this->userService)->getUser();

        if (!$this->user)
        {
            throw new ForbiddenException('Access denied.');
        }
    }

}
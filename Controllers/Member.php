<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Member\Controllers;

class Member extends \BasicApp\Member\MemberController
{

    protected $viewPath = 'BasicApp\Member\Views\Member';
    
    /**
     * Member page.
     *
     * @return mixed
     */
    public function index()
    {
        return $this->render('index');
    }
    
}
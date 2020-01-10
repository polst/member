<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Member;

use BasicApp\Member\Events\UserMenuEvent;

abstract class BaseMemberEvents extends \CodeIgniter\Events\Events
{

    const EVENT_USER_MENU = 'ba:user_menu';

    public static function onUserMenu($callback)
    {
        static::on(static::EVENT_USER_MENU, $callback);
    }

    public static function userMenu()
    {
        $event = new UserMenuEvent;

        $event->items = [];

        static::trigger(static::EVENT_USER_MENU, $event);

        $view = service('renderer');

        $data = $view->getData();

        if (array_key_exists('userMenu', $data))
        {
            return array_merge_recursive($event->items, $data['userMenu']);
        }

        return $event->items;
    }

}
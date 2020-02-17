<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Member;

use BasicApp\Member\Events\MemberMenuEvent;

abstract class BaseMemberEvents extends \CodeIgniter\Events\Events
{

    const EVENT_MEMBER_MENU = 'ba:member_menu';

    public static function onMemberMenu($callback)
    {
        static::on(static::EVENT_MEMBER_MENU, $callback);
    }

    public static function memberMenu()
    {
        $event = new MemberMenuEvent;

        $event->items = [];

        static::trigger(static::EVENT_MEMBER_MENU, $event);

        $view = service('renderer');

        $data = $view->getData();

        if (array_key_exists('memberMenu', $data))
        {
            return array_merge_recursive($event->items, $data['memberMenu']);
        }

        return $event->items;
    }

}
<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\System\SystemEvents;
use BasicApp\Member\Filters\MemberFilter;
use BasicApp\Helpers\Url;
use BasicApp\Site\SiteEvents;
use BasicApp\Member\MemberEvents;

if (class_exists(SystemEvents::class))
{
    SystemEvents::onFilters(function($event)
    {
        $event->aliases['memberIsLoggedIn'] = MemberFilter::class;

        $event->filters['memberIsLoggedIn'] = ['before' => ['/member/', '/member/*']];
    });
}

if (class_exists(SiteEvents::class))
{
    SiteEvents::onAccountMenu(function($event)
    {
        $user = service('user');

        if ($user->getUser())
        {
            $event->items['member'] = [
                'label' => t('member', 'Member'),
                'url' => Url::createUrl('member')
            ];
        }
    });
}

if (class_exists(SiteEvents::class))
{
    SiteEvents::onMainLayout(function($event)
    {
        $event->params['userMenu'] = MemberEvents::memberMenu();
    });
}
<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\System\SystemEvents;
use BasicApp\Member\Filters\MemberFilter;
use BasicApp\Helpers\Url;

SystemEvents::onFilters(function($event)
{
    $event->aliases['memberIsLoggedIn'] = MemberFilter::class;

    $event->filters['memberIsLoggedIn'] = ['before' => ['/member/', '/member/*']];
});
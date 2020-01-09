<?php

use BasicApp\System\SystemEvents;
use BasicApp\Member\Filters\MemberFilter;

SystemEvents::onFilters(function($event)
{
    $event->aliases['memberIsLoggedIn'] = MemberFilter::class;

    $event->filters['memberIsLoggedIn'] = [
        'before' => ['/member/', '/member/*']
    ];
});
<?php

$routes->add('member', '\BasicApp\Member\Controllers\Member::index');
$routes->add('member/(:segment)', '\BasicApp\Member\Controllers\Member::$1');
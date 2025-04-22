<?php

namespace App\Enum;

enum AdminSidebarIconType: string
{
    case DASHBOARD = 'dashboard';
    case TABLE_VIEW = 'table_view';
    case PERSON = 'person';
    case LOGIN = 'login';
}

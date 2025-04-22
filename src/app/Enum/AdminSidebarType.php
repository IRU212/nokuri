<?php

namespace App\Enum;

enum AdminSidebarType: string
{
    case NORMAL = 'normal';
    case MASTER = 'master';
    case ACCOUNT = 'account';
}

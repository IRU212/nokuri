<?php

namespace App\Enum;

enum GoogleDriveMimeType: string {
    case TEXT   = 'text/plan';
    case SHEET  = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
}
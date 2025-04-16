<?php

namespace App\Enum;

enum LayoutButtonColor: string
{
    case PRIMARY = "primary";
    case SECONDARY = "secondary";
    case INFO = "info";
    case SUCCESS = "success";
    case DANGER = "danger";
    case WARNING = "warning";
}
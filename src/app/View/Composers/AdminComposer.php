<?php

namespace App\View\Composers;

use App\Enum\Gender;
use App\Helper\MetaHelper;
use Illuminate\View\View;

final class AdminComposer
{
    /**
     * データをビューと結合
     */
    public function compose(View $view): void
    {
        $view->with('meta', new MetaHelper());
    }
}
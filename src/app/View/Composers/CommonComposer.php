<?php

namespace App\View\Composers;

use App\Enum\Gender;
use App\Enum\Prefecture;
use App\Helper\MetaHelper;
use App\Repositories\UserRepository;
use Illuminate\View\View;

final class CommonComposer
{
    /**
     * データをビューと結合
     */
    public function compose(View $view): void
    {
        $view->with('meta', new MetaHelper());
        $view->with('prefecture', Prefecture::class);
        $view->with('gender', Gender::class);
    }
}
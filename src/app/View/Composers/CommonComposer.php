<?php

namespace App\View\Composers;

use App\Enum\Prefecture;
use App\Repositories\UserRepository;
use Illuminate\View\View;

final class CommonComposer
{
    /**
     * データをビューと結合
     */
    public function compose(View $view): void
    {
        $view->with('prefecture', Prefecture::class);
    }
}
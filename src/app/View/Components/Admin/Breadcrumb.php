<?php

namespace App\View\Components\Admin;

use App\View\Layout\Breadcrumbs;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class Breadcrumb extends Component
{
    /**
     * Breadcrumbs タイトル
     *
     * @var Breadcrumbs
     */
    public readonly Breadcrumbs $breadcrumbs;

    /**
     * Create a new component instance.
     */
    public function __construct(
        Breadcrumbs $breadcrumbs,
    ) {
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.breadcrumb');
    }
}

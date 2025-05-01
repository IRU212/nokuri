<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class Layout extends Component
{
    /**
     * meta タイトル
     *
     * @var string
     */
    public readonly string $title;

    /**
     * meta 説明文
     *
     * @var string
     */
    public readonly string $description;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $title,
        string $description
    ) {
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * キャッシュ対策
     * 
     * @param string $path
     * 
     * @return string
     */
    public function addTimeStamp(string $path): string
    {
        $timestamp = now()->format('YmdHis');
        return "{$path}?{$timestamp}";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.layout');
    }
}

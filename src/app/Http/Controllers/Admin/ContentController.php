<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\View\Layout\Breadcrumbs;

final class ContentController extends Controller
{
    /**
     * コンテンツ一覧画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $title = 'nokuri | 管理コンテンツ';
        $description = '管理コンテンツ画面となります';

        $breadcrumbs = new Breadcrumbs();
        $breadcrumbs->addBreadcrumb(['name' => 'ホーム', 'url' => route('admin.home.index')]);
        $breadcrumbs->addBreadcrumb(['name' => 'コンテンツ']);

        return view('admin.content.index', compact('title', 'description', 'breadcrumbs'));
    }
}

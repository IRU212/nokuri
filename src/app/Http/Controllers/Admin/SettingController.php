<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

final class SettingController extends Controller
{
    /**
     * 管理設定画面を開きます
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $title = 'nokuri | 管理設定';
        $description = '管理設定画面となります';

        return view('admin.setting.index', compact('title', 'description'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prefecture;

final class PrefectureController extends Controller
{
    /**
     * 都道府県一覧を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('admin.prefecture.index', ['prefecture_list' => Prefecture::query()->display()->orderBy('code')->get()]);
    }
}

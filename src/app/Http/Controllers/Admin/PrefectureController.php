<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prefecture;
use Illuminate\Support\Facades\Log;

final class PrefectureController extends Controller
{
    /**
     * 都道府県一覧画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return view('admin.prefecture.index', ['prefecture_list' => Prefecture::query()->display()->orderBy('code')->get()]);
    }

    /**
     * 都道府県編集画面を表示します
     *
     * @param integer $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return view('admin.prefecture.edit', ['prefecture' => Prefecture::query()->findOrFail($id)]);
    }
}

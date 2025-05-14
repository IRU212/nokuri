<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Home\AdminHomeIndexAction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

final class HomeController extends Controller
{
    /**
     * 管理ホーム画面を表示します
     *
     * @param AdminHomeIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(AdminHomeIndexAction $action): \Illuminate\Contracts\View\View
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return view('admin.home.index', $action());
    }
}

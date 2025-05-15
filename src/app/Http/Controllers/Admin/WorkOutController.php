<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\User\AdminUserIndexAction;
use App\Http\Controllers\Controller;
use App\Models\WorkOut;
use Illuminate\Support\Facades\Log;

final class WorkOutController extends Controller
{
    /**
     * 筋トレメニュー一覧画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(AdminUserIndexAction $action): \Illuminate\Contracts\View\View
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return view('admin.work_out.index', ['work_outs' => WorkOut::query()->display()->get()]);
    }
}

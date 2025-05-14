<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Home\UserHomeIndexAction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

final class HomeController extends Controller
{
    /**
     * ユーザホーム画面を表示します
     *
     * @param UserHomeIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(UserHomeIndexAction $action): \Illuminate\Contracts\View\View
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $result = $action();

        return view('user.home.index', $result);
    }
}

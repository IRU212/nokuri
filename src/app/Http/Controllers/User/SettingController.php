<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Setting\UserSettingIndexAction;
use App\Actions\User\Setting\UserSettingUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Setting\UserSettingUpdateRequest;

final class SettingController extends Controller
{
    /**
     * 設定画面を表示
     *
     * @param UserSettingIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(UserSettingIndexAction $action): \Illuminate\Contracts\View\View
    {
        $result = $action();

        return view('user.setting.index', $result);
    }

    /**
     * 設定の更新を行います
     *
     * @param UserSettingUpdateRequest $request
     * @param UserSettingUpdateAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserSettingUpdateRequest $request, UserSettingUpdateAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($request);

        $this->setFlashMessage('message', 'アカウント情報の更新が完了しました。');

        return redirect(route('user.setting.index'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\AdminUser\AdminAdminUserEditAction;
use App\Actions\Admin\AdminUser\AdminAdminUserIndexAction;
use App\Actions\Admin\AdminUser\AdminAdminUserSaveAction;
use App\Actions\Admin\AdminUser\AdminAdminUserUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUser\AdminAdminUserSaveRequest;
use App\Http\Requests\Admin\AdminUser\AdminAdminUserUpdateRequest;
use App\View\Layout\Breadcrumbs;

final class AdminUserController extends Controller
{
    /**
     * 管理者一覧画面を表示します
     *
     * @param AdminAdminUserIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(AdminAdminUserIndexAction $action): \Illuminate\Contracts\View\View
    {
        $title = 'nokuri | 管理者一覧';
        $description = '管理者一覧画面となります';
        $result = $action();

        $breadcrumbs = new Breadcrumbs();
        $breadcrumbs->addBreadcrumb(['name' => 'ホーム', 'url' => route('admin.home.index')]);
        $breadcrumbs->addBreadcrumb(['name' => 'コンテンツ', 'url' => route('admin.content.index')]);
        $breadcrumbs->addBreadcrumb(['name' => $title]);

        return view('admin.admin_user.index', compact('title', 'description', 'breadcrumbs', 'result'));
    }

    /**
     * 管理者作成画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        $title = 'nokuri | 管理者作成';
        $description = '管理者作成画面となります';

        $breadcrumbs = new Breadcrumbs();
        $breadcrumbs->addBreadcrumb(['name' => 'ホーム', 'url' => route('admin.home.index')]);
        $breadcrumbs->addBreadcrumb(['name' => 'コンテンツ', 'url' => route('admin.content.index')]);
        $breadcrumbs->addBreadcrumb(['name' => $title]);

        return view('admin.admin_user.create', compact('title', 'description', 'breadcrumbs'));
    }

    /**
     * 管理者を保存します
     *
     * @param AdminAdminUserSaveRequest $request
     * @param AdminAdminUserSaveAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(AdminAdminUserSaveRequest $request, AdminAdminUserSaveAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($request);

        return redirect(route('admin.admin_user.create'));
    }

    /**
     * 管理者編集画面を表示します
     *
     * @param integer $admin_user_id
     * @param AdminAdminUserEditAction $action6
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $admin_user_id, AdminAdminUserEditAction $action): \Illuminate\Contracts\View\View
    {
        $title = 'nokuri | 管理者編集';
        $description = '管理者編集画面となります';
        $admin_user = $action($admin_user_id);

        $breadcrumbs = new Breadcrumbs();
        $breadcrumbs->addBreadcrumb(['name' => 'ホーム', 'url' => route('admin.home.index')]);
        $breadcrumbs->addBreadcrumb(['name' => 'コンテンツ', 'url' => route('admin.content.index')]);
        $breadcrumbs->addBreadcrumb(['name' => '管理者一覧', 'url' => route('admin.admin_user.index')]);
        $breadcrumbs->addBreadcrumb(['name' => $title]);

        return view('admin.admin_user.edit', compact('title', 'description', 'breadcrumbs', 'admin_user'));
    }

    /**
     * 管理者の更新を行います
     *
     * @param integer $admin_user_id
     * @param AdminAdminUserUpdateRequest $request
     * @param AdminAdminUserUpdateAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(int $admin_user_id, AdminAdminUserUpdateRequest $request, AdminAdminUserUpdateAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($admin_user_id, $request);

        return redirect(route('admin.admin_user.edit'), $admin_user_id);
    }
}

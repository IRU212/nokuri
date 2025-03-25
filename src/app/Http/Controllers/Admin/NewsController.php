<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\AdminNewsDeleteRequest;
use App\Http\Requests\Admin\News\AdminNewsStoreRequest;
use App\Http\Requests\Admin\News\AdminNewsUpdateRequest;

final class NewsController extends Controller
{
    /**
     * お知らせ一覧画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $title = 'nokuri | 管理お知らせ';
        $description = '管理お知らせ画面となります';

        return view('admin.news.index', compact('title', 'description'));
    }

    /**
     * お知らせ登録画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        $title = 'nokuri | 管理お知らせ';
        $description = '管理お知らせ画面となります';

        return view('admin.news.create', compact('title', 'description'));
    }

    /**
     * お知らせ登録を行います
     *
     * @param AdminNewsStoreRequest $request
     * @param AdminNewsStoreAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminNewsStoreRequest $request, AdminNewsStoreAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($request);
        return redirect(route('admin.news.index'));
    }

    /**
     * お知らせ編集画面を表示します
     *
     * @param integer $news_id
     * @param AdminNewsEditAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $news_id, AdminNewsEditAction $action): \Illuminate\Contracts\View\View
    {
        $title = 'nokuri | 管理お知らせ';
        $description = '管理お知らせ画面となります';
        $news = $action($news_id);

        return view('admin.news.edit', compact('title', 'description', 'news'));
    }

    /**
     * お知らせを更新します
     *
     * @param integer $news_id
     * @param AdminNewsUpdateRequest $request
     * @param AdminNewsUpdateAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(int $news_id, AdminNewsUpdateRequest $request, AdminNewsUpdateAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($news_id, $request);
        return redirect(route('admin.news.edit', $news_id));
    }

    /**
     * お知らせを削除します
     *
     * @param AdminNewsDeleteRequest $request
     * @param AdminNewsDeleteAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(AdminNewsDeleteRequest $request, AdminNewsDeleteAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($request);
        return redirect(route('admin.news.index'));
    }
}

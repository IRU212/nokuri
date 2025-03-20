<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Inquiry\UserInquiryStoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Inquiry\UserInquiryStoreRequest;

final class InquiryController extends Controller
{
    /**
     * お問い合わせ画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('user.inquiry.index');
    }

    /**
     * お問い合わせを登録します
     *
     * @param UserInquiryStoreRequest $request
     * @param UserInquiryStoreAction $action
     * @return void
     */
    public function store(UserInquiryStoreRequest $request, UserInquiryStoreAction $action)
    {
        $action($request);

        return redirect(route('user.inquiry.complete'));
    }

    /**
     * お問い合わせ完了画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function complete(): \Illuminate\Contracts\View\View
    {
        return view('user.inquiry.complete');
    }
}

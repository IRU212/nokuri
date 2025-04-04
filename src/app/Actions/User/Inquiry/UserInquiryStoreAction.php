<?php

namespace App\Actions\User\Inquiry;

use App\Http\Requests\User\Inquiry\UserInquiryStoreRequest;
use App\Mail\UserInquiryThanksMail;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Mail;

final class UserInquiryStoreAction
{
    /**
     * お問い合わせを登録します
     *
     * @param UserInquiryStoreRequest $request
     * @return void
     */
    public function __invoke(UserInquiryStoreRequest $request): void
    {
        $inquiry = new Inquiry();
        $inquiry->fill($request->validated());
        $inquiry->save();

        Mail::send(new UserInquiryThanksMail($inquiry));
    }
}

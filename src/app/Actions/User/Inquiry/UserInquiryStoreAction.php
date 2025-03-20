<?php

namespace App\Actions\User\Inquiry;

use App\Http\Requests\User\Inquiry\UserInquiryStoreRequest;
use App\Models\Inquiry;

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
        $inquiry =  new Inquiry();
        $inquiry->saveInquiry($request->validated());
    }
}

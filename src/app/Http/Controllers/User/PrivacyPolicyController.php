<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

final class PrivacyPolicyController extends Controller
{
    /**
     * プライバシーポリシー画面を表示します
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke(): \Illuminate\Contracts\View\View
    {
        return view('user.privacy_policy');
    }
}
